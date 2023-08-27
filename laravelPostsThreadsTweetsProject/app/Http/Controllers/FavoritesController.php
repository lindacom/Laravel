<?php

namespace App\Http\Controllers;

use App\Favorite;
use App\Reply;

use Illuminate\Http\Request;



class FavoritesController extends Controller
{

    // guests cannot favorite a reply
    public function __construct() {
        $this->middleware('auth');
    }

    //insert into the favorites table
    public function store(Rely $reply) {

        $reply->favorite();

        return back();
     // return  $reply->favorite(auth()->id());
     /*   return Favorite::create([
            'user_id' => auth()->id(),
            'farorited_id' => $reply->id,
            'favorited_type' => get_class($reply)
        ]); */
    }

public function destroy(Reply $reply) {
    $reply->unfavorite();
}




}
