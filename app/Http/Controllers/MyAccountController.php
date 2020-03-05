<?php

namespace App\Http\Controllers;

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
            $this->data['image'] = '6.png';

        $this->data['socials'] = backpack_user()->social;
//        dd($this->data['image']);
        return view(backpack_view('my_account'), $this->data);
    }

    /**
     * Save the modified personal information for a user.
     */
    public function postAccountInfoForm(AccountInfoRequest $request)
    {
        $result = $this->guard()->user()->update($request->except(['_token']));

        if (request()->hasFile('image')){
//            dd(request()->image);
            request()->validate([
                'image'=>'file|image|max:5000',
            ]);
//            $url = \request()->file('image')->storeAs('public/profile', backpack_user()->name.'-picture');
            $url = request()->image->store('uploads/profile_picture', 'backpack');
            backpack_user()->image()->create(['imageable_url'=>$url]);
            dd($url);
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

//    public function storeImage($customer){
//        if (\request()->has('image')){
//            $customer->update([
//                'image'= request()->image->store('profile_picture','publicuploads')
//            ]);
//        }
//    }

}
