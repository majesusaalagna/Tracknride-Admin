<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
  
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
            
        $factory = (new Factory)
        ->withServiceAccount(__DIR__.'/FirebaseService.json')
        ->withDatabaseUri('https://track-n-ride-default-rtdb.firebaseio.com/');

        $database = $factory->createDatabase();
        $ref = $database->getReference("users");
        $user = $ref->getValue();
        $total_num = $reference = $database->getReference('users')->getSnapshot()->numChildren();

        foreach($user as $users){
            $all_users[] = $users;
        }

        $database = $factory->createDatabase();
        $ref = $database->getReference("drivers");
        $userDriver = $ref->getValue();
        $total_num1 = $reference = $database->getReference('drivers')->getSnapshot()->numChildren();

        foreach($userDriver as $userDrivers){
            $all_userDrivers[] = $userDrivers;
        }

        //for ride request
        
        $database = $factory->createDatabase();
        $rideRequest = $database->getReference('Ride Requests')->getValue();
        $total_num2 = $reference = $database->getReference('Ride Requests')->getSnapshot()->numChildren();

        //complete rides
        
       
       

        return view('home', compact('all_users', 'total_num', 'all_userDrivers', 'total_num1', 'rideRequest', 'total_num2'));

       
    }

 




}

