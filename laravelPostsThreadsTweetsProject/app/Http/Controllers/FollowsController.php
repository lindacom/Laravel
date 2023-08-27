<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FollowsController extends Controller

{
   public function store(User $user)
    {

    //  if authenticated user is following user unfollow otherwise follow (uses followable trait)
auth()
->user()
->toggleFollow($user);

return back();
    }
    }



