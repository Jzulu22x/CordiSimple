<?php

namespace App\Http\Controllers;

use App\Models\Reserve;
use App\Models\Status;
use Illuminate\Http\Request;

class ReserveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reserves = Reserve::all();

        return view('reserves.index', compact('reserves'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Mientras la migracion de evento no este, no podre hacer una reserva real
        // $statuses = Status::all(); 
        // return view('reserves.create', compact('statuses'));
        return view('reserves.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'status_id' => 'required|integer',
        ]);

        $reserve = new Reserve();
        $reserve->user_id = $validatedData['user_id'];
        $reserve->status_id = $validatedData['status_id'];
        $reserve->save();

        return redirect()->route('reserves.index')->with('success', 'Reserva creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ReserveDetails = Reserve::find($id);

        if(!$ReserveDetails){
            return redirect()->route('reserves.index')->with('error','Category not found');
        }

        return view('reserves.show', compact('ReserveDetails'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reserveDelete = Reserve::find($id);

        if (!$reserveDelete) {
            return redirect()->route('reserves.index')->with('error', 'Category not found');
        }

        $reserveDelete->delete();

        return redirect()->route('reserves.index')->with('success', 'Reserve deleted successfully');
    }
}
