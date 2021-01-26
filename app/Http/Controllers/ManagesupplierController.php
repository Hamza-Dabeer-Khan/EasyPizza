<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class ManagesupplierController extends Controller
{
    //
     public function viewsupplier() 
     {
         $result = false;
         return view('add-supplier', compact('result'));
     }
    public function getsupplier()
    {
        // $allUsersCount=DB::select('SELECT public."getUsersCount"()');
        // return "hamza";
        $allingredients=DB::select('select * from ingredients');
        dump($allingredients);
        die;
        // if(DB::connection()->getDatabaseName())
        // {
        //     echo "Connected sucessfully to database ".DB::connection()->getDatabaseName().".";
        // }
    }

    public function addsupplier(Request $request) 
    {
        // $post = new Post;
        $name = $request->name;
        $email = $request->mail;
        $result = DB::statement('SELECT add_supplier(?, ?)', [$name, $email]);
        return view('add-supplier', compact('result'));
        // return view('menu',compact('allingredietnts'));
    }
    public function editsupplier() 
    {
        return view('edit-supplier');
        // return view('menu',compact('allingredietnts'));
    }
    public function deletesupplier() 
    {
        return view('supplier');
        // return view('menu',compact('allingredietnts'));
    }
    public function hidesupplier() 
    {
        return view('supplier');
        // return view('menu',compact('allingredietnts'));
    }
}
