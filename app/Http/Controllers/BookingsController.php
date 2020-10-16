<?php

namespace App\Http\Controllers;

use App\bookings;
use App\properties;
use App\locations;
use App\Http\Resources\bookings as BookingResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $property = DB::table('properties')->select('__pk')->get();

        $book = DB::table('bookings')->join('properties',function($join){
            $join->on('bookings._fk_property','=','properties.__pk');
        })->join('locations', function($join){
            $join->on('properties._fk_location','=','locations.__pk');
        })->get();
        return view('vue-laravel.booking',compact('book'));

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
     * @param  \App\bookings  $bookings
     * @return \Illuminate\Http\Response
     */
    public function show(bookings $bookings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\bookings  $bookings
     * @return \Illuminate\Http\Response
     */
    public function edit(bookings $bookings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\bookings  $bookings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bookings $bookings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\bookings  $bookings
     * @return \Illuminate\Http\Response
     */
    public function destroy(bookings $bookings)
    {
        //
    }
}
