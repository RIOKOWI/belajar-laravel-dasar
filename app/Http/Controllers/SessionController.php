<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    // MENYIMPAN DATA KE SESSION
    public function createSession(Request $request): string
    {
        $request->session()->put('userId', 'rio');
        $request->session()->put('isMember', true);
        
        return "OK";
        // macam macam session:
        //put()
        //push()
        //pull()
        //increment()
        //decrement()
        //forget()
        //flush()
        //invalidate()

    }

    // MENGAMBIL DATA DARI SESSION
    // get()
    // all()
    // has()
    // missing()
    public function ambilSession(Request $request): string
    {
        $userId = $request->session()->get('userId', 'guest');
        $isMember = $request->session()->get('isMember', 'false');

        return "User Id : ${userId}, Is Member : ${isMember}";  
    }
}
