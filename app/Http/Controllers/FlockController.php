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
        // dd($flocks);
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
    public function store(Request $request) {
		//registrar el nuevo producto en la bd
		// dd($request->all());
		$messages = [
			'name.required' => 'Es necesario ingresar un nombre para el producto',
			'number_of_chickens.required' => 'Este campo es obligatorio',
			'flock_purpose.required' => 'Este campo es obligatorio',
			'acquisition_type.required' => 'Este campo es obligatorio',
			'date_of_acquisition.required' => 'Este campo es obligatorio',
            'additional_notes.required' => 'Este campo es obligatorio'
		];
		$rules = [
			'name' => 'required',
			'number_of_chickens' => 'required',
			'flock_purpose' => 'required',
			'acquisition_type' => 'required',
			'date_of_acquisition' => 'required',
			'additional_notes' => 'required',
		];

		$this->validate($request, $rules, $messages);

		$product = new Flock();
		$product->name = $request->input('name');
		$product->number_of_chickens = $request->input('number_of_chickens');
		$product->flock_purpose = $request->input('flock_purpose');
		$product->acquisition_type = $request->input('acquisition_type');
		$product->date_of_acquisition = $request->input('date_of_acquisition');
		$product->additional_notes = $request->input('additional_notes');
		$product->save(); //ejecutar una consulta INSERT a la tabla productos

		return redirect('/flocks');

	}

    /**
     * Display the specified resource.
     *
     * @param  \App\Flock  $flock
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $flock = Flock::findOrFail($id);
        return view('flocks.show')->witch(compact('flock'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Flock  $flock
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $flock = Flock::findOrFail($id);
        return view('flocks.edit')->witch(compact('flock'));
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
    public function destroy($id)
    {
        $flock = Flock::findOrFail($id);
        $flock->delete();

        return redirect('/flocks');
    }

    public function showAdjustForm()
    {
        $flocks = Flock::all();
        return view('flocks.adjust-quantity', compact('flocks'));
    }

    public function adjustQuantity(Request $request, $id)
    {
        // Validar la solicitud
        $validatedData = $request->validate([
            'adjustment_type' => 'required|in:add,subtract', // 'add' para sumar, 'subtract' para restar
            'quantity' => 'required|numeric|min:0', // La cantidad a ajustar debe ser un número positivo
        ]);

        // Obtener el feed
        $flock = Flock::findOrFail($id);

        // Ajustar la cantidad según el tipo de ajuste
        if ($validatedData['adjustment_type'] == 'add') {
            $flock->number_of_chickens += $validatedData['quantity'];
        } else if ($validatedData['adjustment_type'] == 'subtract') {
            // Verifica que la resta no haga que la cantidad sea negativa
            if ($flock->number_of_chickens >= $validatedData['quantity']) {
                $flock->number_of_chickens -= $validatedData['quantity'];
            } else {
                // Si el ajuste es mayor que la cantidad disponible, puedes manejar el error de forma personalizada
                return redirect()->route('flocks.show', $id)
                    ->withErrors('No puedes restar más cantidad de la que está disponible.');
            }
        }

        // Guardar los cambios
        $flock->update();

        // Redireccionar a la vista del feed con un mensaje de éxito
        return redirect()->route('flocks.show', $id)->with('success', 'Cantidad ajustada correctamente');
    }
}
