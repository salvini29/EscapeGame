<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\Code;
use App\Models\User;

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
        $codes = Code::where('user_id', Auth::user()->id)->get();
        
        if (count($codes) == 0)
        {
            return view('home');
        }
        else
        {
            return view('home', [ 'data' => $codes[0] ]);
        }
    }

    public function sendFriend(Request $request)
    {  
        $code=$request->sendCode;
        $user_mail=$request->friend_mail;

        $user = User::where('email', $user_mail)->get();
        //return count($codes);
        if (count($user) == 0)
        {
            $status = "No existe ese mail!";
            return redirect('/home')->with('failed',$status);
        }

        $user_id = ($user[0])->id;
        $codes = Code::where('user_id', $user_id)->get();
        
        //Si se ingresa un mail mal no funciona

        if (count($codes) == 0)
        {
            Code::create([ 'user_id' => $user_id , 'room_name' => 'dynamics' ,'code_1' => $code , 'code_2' => '' , 'code_3' => '' , 'code_4' => '', 'code_5' => '', 'code_6' => '' ]);
        }
        else
        {
            if ( ($codes[0])->code_2 == '') {
                Code::where('user_id', $user_id)->update([ 'code_2' => $code ]);
            } elseif ( ($codes[0])->code_3 == '') {
                Code::where('user_id', $user_id)->update([ 'code_3' => $code ]);
            } elseif ( ($codes[0])->code_4 == '') {
                Code::where('user_id', $user_id)->update([ 'code_4' => $code ]);
            } elseif ( ($codes[0])->code_5 == '') {
                Code::where('user_id', $user_id)->update([ 'code_5' => $code ]);
            } elseif ( ($codes[0])->code_6 == '') {
                Code::where('user_id', $user_id)->update([ 'code_6' => $code ]);
            }
        }

        $status = "Le has enviado un codigo a tu amigo!";
        return redirect('/home')->with('status',$status);

    }


    public function asd()
    {
        return view('faq');
    }

}
