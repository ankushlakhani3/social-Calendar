<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class usercontroller extends Controller
{
     function getapi($id=0)
    {
        if ($id>11){
         $id=0;} 
        if ($id<0){
         $id=11;} 
        $months= array("January","February","March","April","May","June","July","August","September","October","November","December");
        $data = Http::get('https://v1.igpods.com/api/social_calendar/get/'.$months[$id]);
        return view('welcome', ['data' => $data]);
    }
}
