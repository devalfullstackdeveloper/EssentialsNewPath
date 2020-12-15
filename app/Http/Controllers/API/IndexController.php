<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BOS1;

class IndexController extends Controller
{
    public function index(){
    	return view('index');
    }

    public function setHome(){
    	echo 'here';
    }
    public function Bos1()
    {

    	return view('bos1');
    }
    public function Bos2()
    {
    	return view('bos2');
    }
    public function MIM()
    {
    	return view('mim');
    }

    public function RCS()
    {
    	return view('rcs');
    }

    public function Table()
    {
        $bos1 = BOS1::paginate(15)->onEachSide(3);
        dd($bos1);
        return view('table',compact("bos1"));
    }

    public function Table1()
    {
        $bos1 = BOS1::paginate(15)->onEachSide(5);
        return view('table1',compact("bos1"));
    }

    public function cidm()
    {
        return view('cidm');
    }
}
