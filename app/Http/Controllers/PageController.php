<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Mail;
use Session;

class PageController extends Controller
{
    public function getIndex(){
      $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
      return view('pages.welcome')->withPosts($posts);
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

    public function postContact(Request $request){
      $this->validate($request, [
        'email' => 'required|email',
        'subject' => 'min:3',
        'message' => 'min:10'
      ]);

      $data = [
        'email' => $request->email,
        'subject' => $request->subject,
        'bodyMessage' => $request->message
      ];

      Mail::send('emails.contact', $data, function($message) use ($data){
        $message->from($data['email']);
        $message->to('randy.inverarity@gmail.com');
        $message->subject($data['subject']);
      });

      Session::flash('success', 'Your email has been successfully sent!');

      return view('pages.contact');
      }
}
