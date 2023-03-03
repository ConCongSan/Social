<?php

namespace App\Http\Controllers;
use Laravel\Dusk\DuskServiceProvider;
use Illuminate\Http\Request;
use Socialite;
use App\Models\User;
class FacebookController extends Controller
{
    //Lấy tên provider
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    //Gọi hàm để tạo user
    public function callback($provider)
    {
        $getInfo = Socialite::driver($provider)->user();
        //dd($getInfo->email);
        $isExist = User::where('email','=',$getInfo->email)->count();
        if($isExist > 0)
            return 'hi';
        else
        {
            //Tạo người dùng qua Google
            $user = $this->createUser($getInfo,$provider);
            $name=$getInfo->name;
            
            return 'hello';
        }
        
    
    }

    //Tạo người dùng
    function createUser($getInfo,$provider){

        $user = User::where('email', $getInfo->email)->first();
        
        if (!$user) {
            $user = User::create([
               'Username'     => $getInfo->name,
               'email'    => $getInfo->email,
               'provider' => $provider,
               'provider_id' => $getInfo->id
           ]);
         }
         
    }
}
