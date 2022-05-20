<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class JujuyController extends Controller
{
    //
    public function index(){
        return Inertia::render('Jujuy/index');
    }
}
