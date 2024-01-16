<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;

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
    public function index()
    {
        // $qrCode = QrCode::size(300)->generate('sahretech.com');
        $user = Auth::user();
        $role = $user->role;
        if($role=='administrator'){
            return view('admin.dashboard');

        }else{
            return view('client.dashboard');

        }
    }
}
