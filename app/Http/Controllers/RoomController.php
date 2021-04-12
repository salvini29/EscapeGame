<?php

namespace App\Http\Controllers;

use App\Events\CodeEvent;
use Request;

class RoomController extends Controller
{
    public function dynamicsroom($name,$code)
    {
        return view('dynamicsroom')->with('name', $name)->with('code', $code);
    }

    public function dynamicsroomsend(Request $request,$name,$code)
    {

        $xd = array(
            '1' => request('text'), 
            '2' => Request::url()
        );
        event(new CodeEvent($xd));
        
    }

    /*public function roomcode()
    {
        return view('dynamicsroom2');
    }

    public function roomcodesend(Request $request)
    {
        
        $xd = array(
            '1' => request('text'), 
            '2' => Request::url()
        );
        event(new CodeEvent($xd));
    }*/
}
