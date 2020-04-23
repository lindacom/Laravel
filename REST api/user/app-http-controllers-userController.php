<?php
namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Auth;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserResourceCollection;



class UserController extends Controller



{
   
//functions for index, get, post, put and delete endpoints, to show users in an api by id @param user and returning user resource

    public function show(User $user): UserResource
    {
        return new UserResource ($user);
    }

 public function index(): UserResourceCollection
    {
        return new UserResourceCollection(User::paginate());
    }


 public function store(Request $Request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
        ]);

        $user = User::create($request->all());
        return new UserResourse($user);
    }


public function update(User $user, Request $request): UserResource
    {
        $user->update($request->all());
        return new UserResource($User);
    }

public function destroy(User $user)
    {
        $user->delete();
        return response()->json();
    }

}



