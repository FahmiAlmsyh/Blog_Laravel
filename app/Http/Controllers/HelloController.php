<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    function index() {
        echo "Bonjour World!";
    }

    function style() {
        echo "Ciao World!";
    }
}
