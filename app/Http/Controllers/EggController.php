<?php

namespace App\Http\Controllers;

use App\Egg;
use Illuminate\Http\Request;

class EggController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eggs = Egg::all();
        return view('eggs.index')->with(compact('eggs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eggs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'collection_range' => 'required|in:notSpecified,specifiedBatch',
            'collection_date' => 'required|date',
            'good_eggs' => 'required|integer',
            'bad_eggs' => 'required|integer',
            'additional_notes' => 'nullable|string',
        ]);
    
        Egg::create($validatedData);
    
        return redirect('/eggs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $egg = Egg::findOrFail($id);
        return view('eggs.show')->with(compact('egg'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $egg = Egg::findOrFail($id);
        return view('eggs.edit')->with(compact('egg'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'collection_range' => 'in:notSpecified,specifiedBatch',
            'collection_date' => 'date',
            'good_eggs' => 'integer',
            'bad_eggs' => 'integer',
            'additional_notes' => 'nullable|string',
        ]);
    
        $egg = Egg::findOrFail($id);
        $egg->update($validatedData);
    
        return redirect('/eggs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $egg = Egg::findOrFail($id);
        $egg->delete();

        return redirect('/eggs');
    }
}
