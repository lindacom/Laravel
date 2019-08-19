<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class StudViewController extends Controller {
   public function index() {
      $users = DB::select('SELECT * FROM users');
      return view('stud_view',['users'=>$users]);
   }
}
