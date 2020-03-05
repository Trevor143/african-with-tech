<?php

namespace App\Http\Controllers;

use App\Article;
use Backpack\NewsCRUD\app\Http\Controllers\Admin\ArticleCrudController;
use Backpack\NewsCRUD\app\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;

class ArticleController extends ArticleCrudController
{


    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel("App\Article");
        $this->crud->setRoute(config('backpack.base.route_prefix', 'admin').'/article');
        $this->crud->setEntityNameStrings('article', 'articles');

        /*
        |--------------------------------------------------------------------------
        | LIST OPERATION
        |--------------------------------------------------------------------------
        */
        $this->crud->operation('list', function () {
            $this->crud->addColumn('title');
            $this->crud->addColumn('description');
            $this->crud->addColumn([
                'name' => 'post_type',
                'label' => "Post Type",
                'type' => 'select_from_array',
                'options' => [
                    0 => "Normal",
                    1 => "Main Post",
                    2 => "Post up",
                    3 => "Post down",]
            ]);
            $this->crud->addColumn('status');
            $this->crud->addColumn([
                'name' => 'featured',
                'label' => 'Featured',
                'type' => 'check',
            ]);
            $this->crud->addColumn([
                'label' => 'Category',
                'type' => 'select',
                'name' => 'category_id',
                'entity' => 'category',
                'attribute' => 'name',
            ]);
        });

        /*
        |--------------------------------------------------------------------------
        | CREATE & UPDATE OPERATIONS
        |--------------------------------------------------------------------------
        */
        $this->crud->operation(['create', 'update'], function () {
            $this->crud->setValidation(\App\Http\Requests\ArticleRequest::class);

            $this->crud->addField([
                'name' => 'title',
                'label' => 'Title',
                'type' => 'text',
                'placeholder' => 'Your title here',
            ]);

            $this->crud->addField([
                'name' => 'description',
                'label' => 'Description',
                'hint' => 'A small description of what the article is about',
                'type' => 'text',
                'placeholder' => 'Your description  here',
            ]);

            $this->crud->addField([
                'name' => 'slug',
                'label' => 'Slug (URL)',
                'type' => 'text',
                'hint' => 'Will be automatically generated from your title, if left empty.',
                // 'disabled' => 'disabled'
            ]);
            $this->crud->addField([
                'name' => 'date',
                'label' => 'Date',
                'type' => 'date',
                'default' => date('Y-m-d'),
            ]);
            $this->crud->addField([
                'name' => 'content',
                'label' => 'Content',
                'type' => 'ckeditor',
                'extra_plugins' => ['widget', 'colorbutton', 'justify', 'find', 'codesnippet' ],
                'options' => [
                    'autoGrow_minHeight' => 200,
                    'autoGrow_bottomSpace' => 50,
                ],
//                'removePlugins' => 'image,maximize',
            ]);
            $this->crud->addField([
                'name' => 'image',
                'label' => 'Image',
                'type' => 'browse',
            ]);
            $this->crud->addField([
                'label' => 'Category',
                'type' => 'select2_multiple',
                'name' => 'category',
                'entity' => 'category',
                'attribute' => 'name',
                'pivot' => true,
            ]);
            $this->crud->addField([
                'label' => 'Tags',
                'type' => 'select2_multiple',
                'name' => 'tags', // the method that defines the relationship in your Model
                'entity' => 'tags', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
            ]);
            $this->crud->addField([
                'name' => 'status',
                'label' => 'Status',
                'type' => 'enum',
            ]);
            $this->crud->addField([
                'name' => 'post_type',
                'label' => 'Post Type',
                'type' => 'radio',
                'options'     => [
                    // the key will be stored in the db, the value will be shown as label;
                    0 => "Normal",
                    1 => "Main Post",
                    2 => "Post up",
                    3 => "Post down"
                ],
                'inline'      => true,
            ]);
            $this->crud->addField([
                'name' => 'featured',
                'label' => 'Featured item',
                'type' => 'checkbox',
            ]);
        });
    }

    public function store()
    {
        $this->crud->hasAccessOrFail('create');

//        dd($request);
        // execute the FormRequest authorization and validation, if one is required
        $request = $this->crud->validateRequest();

//        check for post type
        $this->savePostType($request->post_type);

        // insert item in the db
        $item = $this->crud->create($this->crud->getStrippedSaveRequest());
        $this->data['entry'] = $this->crud->entry = $item;
//        $this->savePostType($request->post_type, $item);

        // show a success message
        \Alert::success(trans('backpack::crud.insert_success'))->flash();

        // save the redirect choice for next time
        $this->crud->setSaveAction();

        return $this->crud->performSaveAction($item->getKey());
    }

    public function update()
    {
        $this->crud->hasAccessOrFail('update');

        // execute the FormRequest authorization and validation, if one is required
        $request = $this->crud->validateRequest();

//        check for post type
        $this->savePostType($request->post_type);

        // update the row in the db
        $item = $this->crud->update($request->get($this->crud->model->getKeyName()),
            $this->crud->getStrippedSaveRequest());
//        dd($item);
        $this->data['entry'] = $this->crud->entry = $item;

        // show a success message
        \Alert::success(trans('backpack::crud.update_success'))->flash();

        // save the redirect choice for next time
        $this->crud->setSaveAction();

        return $this->crud->performSaveAction($item->getKey());
    }

    public function savePostType($post_type)
    {
        //First check what post type was selected
        //if normal was selected - do nothing
        //if main was selected
        if ($post_type == 1){
            //check if there is a previous post with main tag and make it normal
            $current_main = Article::where('post_type', $post_type)->first();
            if ($current_main){
                $current_main->post_type = 0;
                $current_main->save();
            }
        }
        //if post up is selected
            //check if there is a previous post with post-up tag and make it normal
            //if not just change post type to post up
        if ($post_type == 2){
            //check if there is a previous post with main tag and make it normal
            $current_up = Article::where('post_type', $post_type)->first();
            if ($current_up){
                $current_up->post_type = 0;
                $current_up->save();
            }
        }
        //if post down is selected
            //check if there is a previous post with post-down tag and make it normal
            //if not just change post type to post down
        if ($post_type == 3){
            //check if there is a previous post with main tag and make it normal
            $current_down = Article::where('post_type', $post_type)->first();
            if ($current_down){
                $current_down->post_type = 0;
                $current_down->save();
            }
        }
    }

}






//if ($post_type == 0){
//    $normal = Article::findBySlug($article->slug);
//    $normal->post_type = $post_type;
//    $normal->update(['post_type'=> $post_type]);
//}
//elseif ($post_type == 1){
//    $current_main = Article::where('post_type', $post_type);
//    if ($current_main){
////                $current_main->post_type = 0;
//        $current_main->update(['post_type'=> 0]);
//        $new_main = Article::findBySlug($article->slug);
//        $new_main->post_type = $post_type;
//        $new_main->update(['post_type'=> $post_type]);
//    }
//    $new_main = Article::findBySlug($article->slug);
//    $new_main->post_type = $post_type;
//    $new_main->update(['post_type'=> $post_type]);
//}
//elseif ($post_type == 2){
//    $current_up = Article::where('post_type', $post_type);
//    if ($current_up){
////                $current_up->post_type = 0;
//        $current_up->update(['post_type'=> 0]);
//        $new_up = Article::findBySlug($article->slug);
//        $new_up->post_type = $post_type;
//        $new_up->update(['post_type'=> $post_type]);
//    }
//    $new_up = Article::findBySlug($article->slug);
//    $new_up->post_type = $post_type;
//    $new_up->update(['post_type'=> $post_type]);
//}
//elseif ($post_type == 3){
//    $current_down = Article::where('post_type', $post_type);
//    if ($current_down){
////                $current_down->post_type = 0;
//        $current_down->update(['post_type'=> 0]);
//        $new_down = Article::findBySlug($article->slug);
//        $new_down->post_type = $post_type;
//        $new_down->update(['post_type'=> $post_type]);
//    }
//    $new_down = Article::findBySlug($article->slug);
//    $new_down->post_type = $post_type;
//    $new_down->update(['post_type'=> $post_type]);
//}
