<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Illuminate\Pagination\Paginator;

use Illuminate\Pagination\CursorPaginator;
class UsersController extends Controller
{

   
    public function index(){
       
        $factory = (new Factory)
        ->withServiceAccount(__DIR__.'/FirebaseService.json')
        ->withDatabaseUri('https://track-n-ride-default-rtdb.firebaseio.com/');
        $database = $factory->createDatabase();
        $users = $database->getReference('users')->getValue();
      
        return view('pages.user', compact('users'));
    }


    
    
}
