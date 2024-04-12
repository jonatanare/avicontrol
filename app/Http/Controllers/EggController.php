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

    public function showAdjustForm()
    {
        $eggs = Egg::all();
        return view('eggs.adjust-quantity', compact('eggs'));
    }

    public function adjustQuantity(Request $request, $id)
    {
        // Validar la solicitud
        $validatedData = $request->validate([
            'adjustment_type' => 'required|in:add,subtract', // 'add' para sumar, 'subtract' para restar
            'quantity' => 'required|numeric|min:0', // La cantidad a ajustar debe ser un número positivo
        ]);

        // Obtener el feed
        $egg = Egg::findOrFail($id);

        // Ajustar la cantidad según el tipo de ajuste
        if ($validatedData['adjustment_type'] == 'add') {
            $egg->good_eggs += $validatedData['quantity'];
        } else if ($validatedData['adjustment_type'] == 'subtract') {
            // Verifica que la resta no haga que la cantidad sea negativa
            if ($egg->good_eggs >= $validatedData['quantity']) {
                $egg->good_eggs -= $validatedData['quantity'];
            } else {
                // Si el ajuste es mayor que la cantidad disponible, puedes manejar el error de forma personalizada
                return redirect()->route('eggs.show', $id)
                    ->withErrors('No puedes restar más cantidad de la que está disponible.');
            }
        }

        // Guardar los cambios
        $egg->update();

        // Redireccionar a la vista del feed con un mensaje de éxito
        return redirect()->route('eggs.show', $id)->with('success', 'Cantidad ajustada correctamente');
    }
}
