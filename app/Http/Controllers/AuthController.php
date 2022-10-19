<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use Hash;
use File;
use Storage;
use Str;


class AuthController extends Controller
{
 
    public function loginUser(Request $request){
        $user = Person::where('email','=',$request->email)->first();
               
        if($user){
           if(Hash::check($request->password,$user->password)){
               return $user;
           }
           else{
               return 'wrong password';
           }
         }
        else{
         return 'user not exist';
        }
        
        }

    public function store(Request $request){
        
        $user = Person::create([
            'name' => $request->name,
            'email' => $request->email,
            'password'  => Hash::make($request->password),
            'user_type' => 0,
            'is_super_admin' => 0
        ]);

        $token = $user->createToken('token')->plainTextToken;

         if($request->hasFile('photo')){

            $image = $request->file('photo');
            $ext = $image->extension();
            $photo_name = Str::kebab($request->name, ' ').'-'.date('d-m-y').'.'.$ext;
            $path = $request->photo->StoreAs('profile-photos',$photo_name);
            $image_url = Storage::url($path);

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
              return response()->json([
                 'user' => $user,
                 'token' => $token,
                 'user_photo' => $user->photos
              ]);
         }
   

    public static function getDimension($path){
        [$width,$height] = getimagesize(Storage::path($path));

        $data = [
            "width" => $width,
            "height" => $height
        ];
         return $data; 
       }
    
}

