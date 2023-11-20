<?php

namespace App\Http\Controllers;

use App\Mail\Test;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller {
    function test() {
        Mail::to('test@truc.fr')->send($t = new Test('toto'));

        return $t;
    }
}
