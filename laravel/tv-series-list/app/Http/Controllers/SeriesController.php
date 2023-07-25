<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Serie;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::all();
        // $series = Serie::with(['seasons'])->get(); // lose performance 
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

    public function store(SeriesFormRequest $request)
    {
        // $nameSeries = $request->name;
        // $newSerie = new Serie();
        // $newSerie->name = $nameSeries;
        // $newSerie->save();

        // Mass Assigment:
        $serie = Serie::create($request->all());
        $seasons = [];
        for ($i=1; $i <= $request->seasonsQty; $i++){
            $seasons[] = [
                'series_id' => $serie->id,
                'number' => $i,
            ];
        }
        Season::insert($seasons);
            
        $episodes = [];
        foreach($serie->seasons as $season){
                for($j=1; $j <= $request->episodesSeason; $j++){
                $episodes[] = [
                    'season_id' => $season->id,
                    'number' => $i,
                ];
            }
        }
        Episode::insert($episodes);
        // $request->session()->flash("msg.success","'{$serie->name}' added successfully");
        // search about ->except, ->only ....

        // DB::insert('INSERT INTO series (name) VALUES (?)', [$nameSeries]);
        return to_route('series.index')->with("msg.success","'{$serie->name}' added successfully");
    }
    public function destroy(Serie $series)
    {
        // dd($request->route());
        // Serie::destroy($request->series);
        $series->delete();

        // $request->session()->put('msg.success', 'TV Serie successfully deleted!');
        // $request->session()->flash('msg.success', "'{$series->name}' successfully deleted!");

        return to_route('series.index')->with('msg.success', "'{$series->name}' successfully deleted!");
    }
    public function edit(Serie $series)
    {
        return view('series.edit')->with('serie', $series);
    }

    public function update(Serie $series, SeriesFormRequest $request)
    {
        // $series->name = $request->name;
        $series->fill($request->all()); // use fillable 
        $series->save();
        
        return to_route('series.index')->with('msg.success', "'{$series->name}' successfully updated!");
    }
}
