<?php

namespace App\Http\Controllers;

use App\discounts;
use App\locations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DiscountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $prices = DB::table('discounts as dis')->join('properties as pro', function($join){
            $join->on('dis._fk_property','=','pro.__pk');
        })->join('locations', function($join){
            $join->on('pro._fk_location','=','locations.__pk');
        })->get();

        //dd($prices);
        return view('vue-laravel.offer',compact('prices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\discounts  $discounts
     * @return \Illuminate\Http\Response
     */
    public function show(discounts $discounts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\discounts  $discounts
     * @return \Illuminate\Http\Response
     */
    public function edit(discounts $discounts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\discounts  $discounts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, discounts $discounts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\discounts  $discounts
     * @return \Illuminate\Http\Response
     */
    public function destroy(discounts $discounts)
    {
        //
    }
}
