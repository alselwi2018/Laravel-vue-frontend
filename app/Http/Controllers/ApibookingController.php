<?php
namespace App\Http\Controllers;
use App\bookings;
use App\properties;
use App\locations;
use App\Http\Resources\bookings as ApibookingResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class ApibookingController extends Controller
{
    public function index()
    {
        $property = DB::table('properties')->select('__pk')->get();

        $book = DB::table('bookings')->join('properties',function($join){
            $join->on('bookings._fk_property','=','properties.__pk');
        })->leftJoin('locations', function($join){
            $join->on('properties._fk_location','=','locations.__pk');
        })->paginate(10);

        return response(new Collection($book));
        //return (new Collection($book))->paginate(5);

    }
}
