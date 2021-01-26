<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ManageingredientsController extends Controller
{
    //

    public function get_menu() {
        $result = DB::select('SELECT * from get_ingredients()');
        // dd($result);
        return view('menu', compact('result'));
    }
    public function get_ingredients()
    {
        // $allingredietnts=DB::select('select * from ingredients');
        $result = DB::select('SELECT * from get_ingredients()');
        return view('ingredient', compact('result'));
    }

    public function edit_ingredients($id)
    {
        $result = collect();
        $sup = collect();
        $result = DB::select('SELECT * from popup_ingredients(?)', [$id]);
        $sup = DB::select('SELECT * from get_supplier()');
        return view('edit-ingredients', compact('result', 'sup'));
        // dd($result);
    }

    public function get_supplier()
    {
        $result = DB::select('SELECT * from get_supplier()');
        $flag = false;
        return view('supply', compact('result','flag'));
    }
    public function add_ingredients(Request $request)
    {
        //  dd($request);
        $ingre_name = $request->ingredient_name;
        $reg_provenance =$request->rg_provenance;
        $supplier_id = $request->supplier;
        $qty = $request->quantity;
        $price = $request->price;
        // dd($request);
        $flag = DB::statement('SELECT add_ingredients(?, ?, ?, ?, ?)', [$supplier_id, $ingre_name, $reg_provenance, $price, $qty]);
        $result = DB::select('SELECT * from get_supplier()');
        // dd($result);
        return view('supply', compact('result','flag'));
    }
    public function update_ingredients(Request $request) 
    {
        $ing_id = $request->ing_id;
        $supplier_id = $request->sup_id;
        $ingre_name = $request->ingredient_name;
        $reg_provenance =$request->rg_provenance;
        $price = $request->price;
        $qty = $request->quantity;
        //dd($request);
        $flag = DB::statement('SELECT update_ingredients(?, ?, ?, ?, ?, ?)', [$ing_id, $supplier_id, $ingre_name, $reg_provenance, $price, $qty]);

        $result = DB::select('SELECT * from popup_ingredients(?)', [$ing_id]);
        $sup = DB::select('SELECT * from get_supplier()');
        // return Redirect::to('http://localhost/htpwork/easypizza/public/edit-ingredients');
        $result = DB::select('SELECT * from get_ingredients()');
        return view('ingredient', compact('result'));
        //  return view('', compact('result', 'sup'));
    }

    public function delete_ingredients($id) 
    {
        $result = DB::select('SELECT * from delete_ingredient(?)', [$id]);
        $result = DB::select('SELECT * from get_ingredients()');
        return view('ingredient', compact('result'));
    }
    public function hide_ingredient($id)
    {
        $flag = false;
        $res = DB::select('SELECT * from hide_ingredient(?,?)', [$id,$flag]);
        $result = DB::select('SELECT * from get_ingredients()');
        //  dd($res);
        return view('ingredient', compact('result'));
    }
    public function show_ingredient($id)
    {
        $flag = true;
        $res = DB::select('SELECT * from hide_ingredient(?,?)', [$id,$flag]);
        $result = DB::select('SELECT * from get_ingredients()');
        //  dd($res);
        return view('ingredient', compact('result'));
    }
}
