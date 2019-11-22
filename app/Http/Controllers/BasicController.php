<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BasicController extends Controller
{
  public function index() {
    return view('welcome');
  }
}
