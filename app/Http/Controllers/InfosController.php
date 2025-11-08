<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class InfosController extends Controller
{
    function index() : View {
       return view('infos');
    }
}
