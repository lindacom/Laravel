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

        if (Session::has('oldUrl')) {
            return redirect()->to(Session::get('oldUrl'));
        }
        return redirect()->route('product.index');
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
        $orders = Auth::user()->orders;
       
      /*  $orders->transform(function($order, $key) {
        $order->cart = unserialize($order->cart);

            return $order;
        });*/

        return view('user.profile', ['orders' => $orders]);
    }

    public function getLogout() {
        Auth::logout();
        return redirect()->route('user.signin');
    }
}
