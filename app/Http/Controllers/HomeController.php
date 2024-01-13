<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
        return view('client.permintaan');
    }
}