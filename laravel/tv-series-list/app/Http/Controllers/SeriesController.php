<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = [
            'The Boys',
            'Supernatural',
            'Peaky Blinders'
        ];

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
}
