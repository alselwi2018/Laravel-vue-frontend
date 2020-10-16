<?php

namespace App\Http\Controllers;

use App\price_bands;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApipricebandController extends Controller
{
    public function index(){
    $pro = DB::table('price_bands as pb')->join('properties as pro', function($join){
        $join->on('pb._fk_property','=','pro.__pk');
    })->join('locations as loc', function($join){$join->on('pro._fk_location','=','loc.__pk');})->paginate(10);
    //dd($pro);
        return response(new Collection($pro));
    }

}
