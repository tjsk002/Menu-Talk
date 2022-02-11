<?php

namespace App\Http\Controllers;

use function view;

class RemindController extends Controller
{
    public function create(){
        return view('remind.create');
    }
}
