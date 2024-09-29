<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\KirimEmail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function index(Request $request)
    {
        // Mail::to($request->user())->send(new KirimEmail($id));
    }
}

// Mail::to($request->user())->send(new OrderShipped($order));
