<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
class UserDriversController extends Controller
{
    public function index(){
            $factory = (new Factory)
            ->withServiceAccount(__DIR__.'/FirebaseService.json')
            ->withDatabaseUri('https://track-n-ride-default-rtdb.firebaseio.com/');
            $database = $factory->createDatabase();
            $userDriver = $database->getReference('drivers')->getValue();
            return view('pages.userDriver', compact('userDriver'));
    }

    public function edit($id){
        $key = $id;
        $factory = (new Factory)
        ->withServiceAccount(__DIR__.'/FirebaseService.json')
        ->withDatabaseUri('https://track-n-ride-default-rtdb.firebaseio.com/');
        $database = $factory->createDatabase();
        $edituserDriver = $database->getReference('drivers')->getChild($key)->getValue();
        return view('pages.edit-userDriver', compact('edituserDriver', 'key'));

    }

    public function update(Request $request, $id){
        $key = $id;
        $factory = (new Factory)
        ->withServiceAccount(__DIR__.'/FirebaseService.json')
        ->withDatabaseUri('https://track-n-ride-default-rtdb.firebaseio.com/');
        $database = $factory->createDatabase();

      

        $updateData =[
            'email' => $request->email,
            'name' => $request->name,
            'phone' => $request->phone,
        ];
        $res_update = $database->getReference('drivers'.'/'.$key)->update($updateData);
        return redirect('userDrivers')->with('status', 'Users Updated Successfully!');
        
    }

    public function destroy($id){
        $key = $id;
        $factory = (new Factory)
        ->withServiceAccount(__DIR__.'/FirebaseService.json')
        ->withDatabaseUri('https://track-n-ride-default-rtdb.firebaseio.com/');
        $database = $factory->createDatabase();
        
        $deluser = $database->getReference('userDrivers'.'/'.$key)->remove();
        return redirect('userDrivers')->with('status', 'Users Deleted Successfully!');
    }


    
    //
}
