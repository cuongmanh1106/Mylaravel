<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Mycontroller extends Controller
{
    //
    public function hello()
    {
    	//echo "hello everyone";

    	return view('thongtin');//goi view
    }

    //bai 5: dinh danh
    public function HC()
    {
    	echo "Action trong Mycontroller";
    	return redirect()->route("hcm");
    }
}

