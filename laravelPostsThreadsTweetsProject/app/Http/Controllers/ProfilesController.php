<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller

{
   public function show(User $user)
    {
 // $user = User::findOrFail($user);
   
//  return view('profile', $user);
return view('profile', compact('user'));
      }


public function edit(User $user) {

   return view('profiles.edit', compact('user'));
}

public function update(User $user) {

  $attributes = request()->validate([
      // must be unique but ignore the current user details

      //RULE UNIQUE USERS ISN'T WORKING - NOT FOUND
    //  'username' => ['string', 'required', 'max:255', 'alpha_dash', Rule::unique('users')->ignore($user),],
  
'name' => ['string', 'required', 'max:255'],
'username' => ['string', 'required', 'max:255', 'alpha_dash',],
'avatar' => ['file',],
//'email' => ['string', 'required', 'email', 'max:255', Rule::unique('users')->ignore($user),],
'email' => ['string', 'required', 'email', 'max:255',],
'password' => ['string', 'required', 'min:8', 'max:255','confirmed',],
   ]);

   $attributes['avatar'] = request('avatar')->store('avatars');

   $user->update($attributes);
   
   return redirect ($user->path());
   }
    
    }



