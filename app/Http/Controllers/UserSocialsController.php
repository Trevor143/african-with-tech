<?php

namespace App\Http\Controllers;

use App\UserSocials;
use http\Env\Response;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class UserSocialsController extends Controller
{
//    public function store(Request $request)
//    {
//        $socials = $request->all();
//        dd($socials);
//        backpack_user()->social()->create($socials);
//    }

    public function store(Request $request)
    {
        if($request->ajax()){
            {
                $rules = array(
                    'social_name.*' => 'required',
                    'social_url.*' => 'required'
                );
                $error = Validator::make($request->all(), $rules);
                if ($error->fails()){
                    return response()->json([
                        'error'=> $error->errors()->all()
                    ]);
                }
//                dd($request);

                $social_name = $request->social_name;
                $social_url = $request->social_url;

                for ($count = 0; $count < count($social_name); $count++){
                    $data = array(
                        'social_name'=>$social_name[$count],
                        'social_url' => $social_url[$count],
                        'user_id' => backpack_user()->id
                    );
                    $insert_data[]= $data;
                }
//                backpack_user()->social()->save(new UserSocials($insert_data));
                UserSocials::insert($insert_data);
                return response()->json([
                    'success' => 'Socials added successfully'
                ]);
            }
        }
    }
}
