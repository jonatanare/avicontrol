<?php

namespace App\Http\Controllers;

use App\Flock;
use Illuminate\Http\Request;

class FlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flocks = Flock::all();
        dd($flocks);
        return view('flocks.index', compact('flocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('flocks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        $validatedData = $request->validate([
            'name'=> 'required|max:255',
            'number_of_chickens'=> 'required|max:255',
            'flock_purpose'=> 'required|max:255',
            'acquisition_type'=> 'required|max:255',
            'date_of_acquisition'=> 'required|date|max:255',
            'aditional_notes'=> 'required|max:255'
        ]);

        try {
            $flock = Flock::create($validatedData);
            dd($flock);
            return redirect()->route('flocks.index')->with('success', 'Flock created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error creating Flock: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Flock  $flock
     * @return \Illuminate\Http\Response
     */
    public function show(Flock $flock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Flock  $flock
     * @return \Illuminate\Http\Response
     */
    public function edit(Flock $flock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Flock  $flock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flock $flock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Flock  $flock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flock $flock)
    {
        //
    }
}
