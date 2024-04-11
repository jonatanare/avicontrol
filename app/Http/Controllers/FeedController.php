<?php

namespace App\Http\Controllers;

use App\Feed;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feeds = Feed::all();
        return view('feeds.index', compact('feeds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('feeds.create');
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
            'addition_range' => 'required|in:notSpecified,specifiedBatch',
            'addition_date' => 'required|date',
            'feed_type' => 'required|string',
            'quantity' => 'required|numeric',
            'additional_notes' => 'nullable|string',
        ]);
    
        Feed::create($validatedData);
    
        return redirect()->route('feeds.index')->with('success', 'Feed added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feed = Feed::findOrFail($id);
        return view('feeds.show', compact('feed'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feed = Feed::findOrFail($id);
        return view('feeds.edit', compact('feed'));
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
            'addition_range' => 'required|in:morning,afternoon,evening,night',
            'addition_date' => 'required|date',
            'feed_type' => 'required|string',
            'quantity' => 'required|numeric',
            'additional_notes' => 'nullable|string',
        ]);
    
        $feed = Feed::findOrFail($id);
        $feed->update($validatedData);
    
        return redirect()->route('feeds.index')->with('success', 'Feed updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feed = Feed::findOrFail($id);
        $feed->delete();

        return redirect()->route('feeds.index')->with('success', 'Feed deleted successfully');
    }
}
