<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class ChangePasswordController extends Controller
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
        
        return view('change_password');

    }

    public function passwordUpdate(Request $request){
        //validation rules

        $request->validate([
            'password'=>'required|min:4|string|max:255'
        ]);
        $user =Auth::user();
        $user->password = $request['password'];
        $user->save();
        return back()->with('message','Password Updated');
    }
    
  

   

}