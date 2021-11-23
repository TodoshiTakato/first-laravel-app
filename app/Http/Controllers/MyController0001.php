<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController0001 extends Controller
{
    public function hello0000 (){
//            <div class='flex-center position-ref full-height'>
//                <div style='content'>
        $html_string = "
            <div style='align-items: center; display: flex; justify-content: center; position: relative; height: 98vh;'>
                <div style='text-align: center;'>
                    <h1>Hello, World!</h1>
                    <hr>
                    <h2><a href='/'>
                        Return to the main page
                    </a></h2>
                </div>
            </div>
        ";
        return $html_string;
    }

    public function hello0001 () {
        return view('hello.0001');
    }

    public function hello0002 () {
        return view('hello.0002', [
            'name' => 'Alex'
        ]);
    }

    public function hello0003 () {
        $name = 'Smith';
        return view('hello.0003', [
            'name' => $name
        ]);
    }

    public function hello0004 () {
        return view('hello.0004') -> with('name', 'John');
    }

    public function index() {
        $html_string = "
            <div style='align-items: center; display: flex; justify-content: center; position: relative; height: 98vh;'>
                <div style='text-align: center;'>
                    <h1>Hello, User!<br>
                    There's no variable passed to here<br></h1>
                    <hr>
                    <h2><a href='/'>
                        Return to the main page
                    </a></h2>
                </div>
            </div>
        ";
        return $html_string;
    }

    public function outputting_variable($variable_name_doesn_matter = null) {
        return view('myuser', compact('variable_name_doesn_matter'));
    }


}
