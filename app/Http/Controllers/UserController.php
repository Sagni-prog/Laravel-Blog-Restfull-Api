<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use File;
use Storage;
use Str;

class UserController extends Controller
{
    public function store(Request $request){

       
        $user = User::create(
            [
             'name' => $request->name,
             'email' => $request->email,
             'password' => Hash::make($request->password)
            ]
         );

       $token =  $user->createToken('token')->plainTextToken;

       if($request->hasFile('photo')){
           $image = $request->file('photo');
           $photo_extension = $image->extension();
           $photo_name = Str::kebab($request->name).data('d-m-y').$photo_extension;
           $photo_path = Storage::putFileAs('profile-photos',$image,$photo_name);
           $photo_url = Srorage::url($photo_path);

           $data = $this->getDimension($path);
           $width = $data['width'];
           $height = $data['height'];

           $user->photos()->create([
            'photo_name' => $photo_name,
            'photo_path' => $path,
            'photo_urel' => $image_url,
            'width' => $width,
            'height' => $height
     ]);

       }
       else{
            $user->photos()->create([
                'photo_name' => 'avator.svg',
                'photo_path' => 'default-profile/avator.svg',
                'photo_url' => 'http://localhost:8000/storage/default-profile/avator.svg',
         ]);
       }

         $response = [
             'user' => $user,
             'token' => $token,
             'status' => 200,
             'message' => "you have successfully registered"
         ];
 
         return response()->json($response);
     }

     public static function getDimension($path){
        [$width,$height] = getimagesize(Storage::path($photo_path));

        $data = [
            "width" => $width,
            "height" => $height
        ];
         return $data; 
    }

}
