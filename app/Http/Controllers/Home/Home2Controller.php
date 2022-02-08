<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

class Home2Controller
{
    // 홈 페이지
    public function home(Request $request)
    {
        return view('home.home2');
    }


}
