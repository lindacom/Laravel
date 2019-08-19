<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class StudDeleteController extends Controller {
   public function index() {
      $users = DB::select('select * from users');
      return view('stud_delete_view',['users'=>$users]);
   }
   public function destroy($id) {
      DB::delete('delete from users where id = ?',[$id]);
      echo "Record deleted successfully.<br>";
      echo "<a href='/delete-records'>Delete another user</a>";
      
        }
}
