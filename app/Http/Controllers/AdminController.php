<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\IsAdmin;

class AdminController extends Controller
{
    //
    public function index(){
        return "you are admin";
    }
}
