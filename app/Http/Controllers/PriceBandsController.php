<?php

namespace App\Http\Controllers;

use App\price_bands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PriceBandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$prices = price_bands::orderBy('__pk')->paginate(5);
       // dd($prices);
       $pro = DB::table('price_bands as pb')->join('properties as pro', function($join){
        $join->on('pb._fk_property','=','pro.__pk');
    })->get();
    //dd($pro);
        return view('vue-laravel.price_band',compact('prices','pro'));
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
     * @param  \App\price_bands  $price_bands
     * @return \Illuminate\Http\Response
     */
    public function show(price_bands $price_bands)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\price_bands  $price_bands
     * @return \Illuminate\Http\Response
     */
    public function edit(price_bands $price_bands)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\price_bands  $price_bands
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, price_bands $price_bands)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\price_bands  $price_bands
     * @return \Illuminate\Http\Response
     */
    public function destroy(price_bands $price_bands)
    {
        //
    }
}
