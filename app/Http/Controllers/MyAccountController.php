<?php

namespace App\Http\Controllers;

use App\Image;
use Backpack\CRUD\app\Http\Requests\AccountInfoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Prologue\Alerts\Facades\Alert;

class MyAccountController extends \Backpack\CRUD\app\Http\Controllers\MyAccountController
{
    /**
     * Show the user a form to change his personal information & password.
     */
    public function getAccountInfoForm()
    {
        $this->data['title'] = trans('backpack::base.my_account');
        $this->data['user'] = $this->guard()->user();
        $this->data['description'] = backpack_user()->description;

        if (backpack_user()->image)
            $this->data['image'] = backpack_user()->image->imageable_url;
        else
            $this->data['image'] = 'user_icon.png';

        $this->data['socials'] = backpack_user()->social;

        return view(backpack_view('my_account'), $this->data);
    }

    /**
     * Save the modified personal information for a user.we
     */
    public function postAccountInfoForm(AccountInfoRequest $request)
    {
        $result = $this->guard()->user()->update($request->except(['_token']));

        if (request()->hasFile('image')){
            request()->validate([
                'image'=>'file|image|max:5000',
            ]);
            if (backpack_user()->image){
                Storage::disk('public')->delete(backpack_user()->image->imageable_url);
                Image::destroy(backpack_user()->image->id);
            }
            $url = request()->image->store('profile_picture', 'public');
            backpack_user()->image()->create(['imageable_url'=>$url]);
        }

        backpack_user()->description = $request->description ;
        backpack_user()->save();

        if ($result) {
            Alert::success(trans('backpack::base.account_updated'))->flash();
        } else {
            Alert::error(trans('backpack::base.error_saving'))->flash();
        }

        return redirect()->back();
    }

}
