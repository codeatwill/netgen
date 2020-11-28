<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /*******************************************************************
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
		
    }

    /*******************************************************************
     * 
     * Show's the front page.
     *
     */
    public function frontPage()
    {
        return view('home.welcome');
    }
}
