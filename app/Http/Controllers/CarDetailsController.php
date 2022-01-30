<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
class CarDetailsController extends Controller
{
    public function index($id){
        $key = $id;
            $factory = (new Factory)
            ->withServiceAccount(__DIR__.'/FirebaseService.json')
            ->withDatabaseUri('https://track-n-ride-default-rtdb.firebaseio.com/');
            $database = $factory->createDatabase();
            $carDetails = $database->getReference('drivers')->getChild($key)->getChild('car_details')->getValue();
            $credentials = $database->getReference('drivers')->getChild($key)->getChild('credentials')->getValue();
            return view('car-details', compact('carDetails', 'key', 'credentials'));
    }
}
