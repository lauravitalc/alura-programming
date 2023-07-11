<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Serie;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::all();
        // $series = Serie::query()->orderBy('name')->get();
        // $series = DB::select('SELECT name FROM series');
        
        // return view('series.index', [
        //     'series' => $series
        // ]);
        // return view('series.index', compact('series'));
        return view('series.index')->with('series', $series);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        // $nameSeries = $request->name;
        // $newSerie = new Serie();
        // $newSerie->name = $nameSeries;
        // $newSerie->save();

        // Mass Assigment:
        Serie::create($request->all());
        // search about ->except, ->only ....
        
        // DB::insert('INSERT INTO series (name) VALUES (?)', [$nameSeries]);
        return redirect('/series');
    }
}
