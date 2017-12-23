<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex(){
      return view('pages.welcome');
    }

    public function getAbout(){
      $first = 'Randy';
      $last = 'Inverarity';
      $email = 'randy.inverarity@gmail.com';
      $fullname = $first . " " . $last;
      $data = [
        'email' => $email,
        'fullname' => $fullname
      ];


      return view('pages.about')->withData($data);
    }

    public function getContact(){
      return view('pages.contact');
    }
}
