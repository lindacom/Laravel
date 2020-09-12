<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Order;
use Illuminate\Http\Request;

use Session;
use App\Http\Requests;

class UserController extends Controller
{
    public function getSignup() {
        return view('user.signup');
    }

    public function postSignup(Request $request) {
        $this->validate($request, [
            'email' => 'email|required|unique:users',
            'password' => 'required|min:4'
        ]);

        $user = new User([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
        $user->save();

        Auth::login($user);
// after login check if the session hass a previous url and redirect there. Clear old url from session so that user is not always redirected there after login
        if (Session::has('oldUrl')) {
            $oldUrl = Session::et('oldUrl');
            Session::forget('oldUrl');
            return redirect()->to('oldUrl');
        }
        return redirect()->route('user.profile');
    }

    public function getSignin() {
        return view('user.signin');
    }

    public function postSignin(Request $request) {
       
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required|min:4'
        ]);
        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
            ])) {
                return redirect()->route('user.profile');
            } 

            if (Session::has('oldUrl')) {
                return redirect()->to(Session::get('oldUrl'));
            }

            return redirect()->back();
            }
        
    

    public function getProfile() {
        //get the purchases belonging to the logged in user. Unserialize the cart (that was previously serialised into the database in the post checkout action)
        //make purchase available in the user profile view.

        $name = Auth::user(); //get user details and pass to the profile view.  Currently user only signs up with email not with a name so name isn't available

        $purchases = Auth::user()->purchases;
       
        $purchases->transform(function($purchase, $key) { //transform loops through items in the cart
        $purchase->cart = unserialize($purchase->cart);

            return $purchase;
        });

        return view('user.profile', ['purchases' => $purchases, 'name' => $name]);
    }

    public function getLogout() {
        Auth::logout();
        return redirect()->route('user.signin');
    }

      public function postSaveAccount(Request $request)
    {
        $this->validate($request, [
           'first_name' => 'required|max:120'
        ]);

        $user = Auth::user();
        $old_name = $user->first_name;
        $user->first_name = $request['first_name'];
        $user->update();
        $file = $request->file('image');
        $filename = $request['first_name'] . '-' . $user->id . '.jpg';
        $old_filename = $old_name . '-' . $user->id . '.jpg';
        $update = false;
        if (Storage::disk('local')->has($old_filename)) {
            $old_file = Storage::disk('local')->get($old_filename);
            Storage::disk('local')->put($filename, $old_file);
            $update = true;
        }
        if ($file) {
            Storage::disk('local')->put($filename, File::get($file));
        }
        if ($update && $old_filename !== $filename) {
            Storage::delete($old_filename);
        }
        return redirect()->route('account');
    }

  }
