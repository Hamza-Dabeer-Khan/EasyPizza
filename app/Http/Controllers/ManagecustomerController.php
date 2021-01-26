<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagecustomerController extends Controller
{
    //
    public function customer_order(Request $request)
    {
        dd($request->customer_ingredient);

    }
}
