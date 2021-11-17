<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController0001 extends Controller
{
    public function index() {
        return "Hello, User! <br><br><hr><a href='/'>Return to the main page</a>";
    }
    public function outputting_variable($variable_name_doesn_matter = null) {
        return view('myuser', compact('variable_name_doesn_matter'));
    }
}
