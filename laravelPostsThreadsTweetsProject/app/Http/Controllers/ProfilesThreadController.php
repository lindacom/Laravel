<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class ProfilesThreadController extends Controller
{
   

    public function show(User $user) {
      $activities = $user->activity()->latest()->with('subject')->take(5)->get()->groupBy(
      
              function ($activity) {
                return $activity->created_at->format('Y-m-d');
            });
        
        return view('profiles.showthread', [
            'profilethreadUser' => $user,
            'activities' => $activities

            // threads has been amended to activities instead
          //  'threads' => $user->activity()->paginate(1)
        ]);
    }
}
