<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class PageController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function faq()
    {
        return view('faq');
    }

    public function testeo()
    {
        return view('testeo');
    }
    public function createComment(Request $request)
    {
    	Comment::create(['nombre' => request('name') , 'tel' => request('phone') , 'email' => request('email') , 'asunto' => request('subject') ,  'mensaje' => request('message') ]);
    	return redirect('/');
    }
}
