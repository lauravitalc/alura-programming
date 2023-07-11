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
        $msgSuccess = $request->session()->get('msg.success');
        // $request->session()->forget('msg.success');
        
        // $series = Serie::query()->orderBy('name')->get();
        // $series = DB::select('SELECT name FROM series');
        
        // return view('series.index', [
        //     'series' => $series
        // ]);
        // return view('series.index', compact('series'));
        return view('series.index')->with('series', $series)->with('msgSuccess', $msgSuccess);
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
        $request->session()->flash('msg.success','Added successfully');
        // search about ->except, ->only ....

        // DB::insert('INSERT INTO series (name) VALUES (?)', [$nameSeries]);
        return to_route('series.index');
    }
    public function destroy(Request $request)
    {
        // dd($request->route());
        Serie::destroy($request->series);
        // $request->session()->put('msg.success', 'TV Serie successfully deleted!');
        $request->session()->flash('msg.success', 'TV Serie successfully deleted!');

        return to_route('series.index');
    }
}
