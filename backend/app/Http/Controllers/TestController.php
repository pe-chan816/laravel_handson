<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

class TestController extends Controller
{
  public function func(){
    $test = new Test;
    $value = $test->find(1)->title;

    return view('welcome', compact('value'));
  }
}
