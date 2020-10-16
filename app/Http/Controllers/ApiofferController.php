<?php

namespace App\Http\Controllers;


use App\discounts;
use App\locations;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ApiofferController extends Controller
{
       public function index(){
        $disc = DB::table('discounts as dis')->join('properties as pro', function($join){
            $join->on('dis._fk_property','=','pro.__pk');
        })->join('locations', function($join){
            $join->on('pro._fk_location','=','locations.__pk');
        })->paginate(10);
        //return view('vue-laravel.offer', compact('disc'));
        return response(new Collection($disc));
    }
}
