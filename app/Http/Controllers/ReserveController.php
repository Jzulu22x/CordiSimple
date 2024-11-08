<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use App\Models\Reserve;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReserveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->roles_id == '2') {
                $reserves = Reserve::all();
                return view('reserves.admin.index', compact('reserves'));
            } else {
                $reserves = Reserve::where('user_id', $user->id)->get();
                return view('reserves.user.index', compact('reserves'));
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->roles_id == '2') {
                $events = Event::all();
                $users = User::all();
                $statuses = Status::all();
                return view('reserves.admin.create', compact('events', 'users', 'statuses'));
            } else {
                $events = Event::all();
                return view('reserves.user.create', compact('events')); 
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'event_id' => 'required|integer',
            'user_id' => 'required|exists:users,id',
            'status_id' => 'required|integer',
        ]);

        $reserve = new Reserve();
        $reserve->event_id = $validatedData['event_id'];
        $reserve->user_id = $validatedData['user_id'];
        $reserve->status_id = $validatedData['status_id'];
        $reserve->save();

        if (Auth::check()) {
            $user = Auth::user();

            if ($user->roles_id == '2') {
                return redirect()->route('reserves.admin.index')->with('success', 'Reserva creada exitosamente.');
            } else {
                $events = Event::all();
                return redirect()->route('reserves.user.index')->with('success', 'Reserva creada exitosamente.');
            }
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ReserveDetails = Reserve::find($id);

        if (!$ReserveDetails) {
            return redirect()->route('reserves.index')->with('error', 'Category not found');
        }

        return view('reserves.user.show', compact('ReserveDetails'));
    }

    public function edit(string $id)
    {
        $events = Event::all();
        $users = User::all();
        $statuses = Status::all();
        $reserveEdit = Reserve::findOrFail($id);
        return view('reserves.admin.edit', compact('reserveEdit','events', 'users', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Auth::user();
        $reserve = Reserve::find($id);
        
        if (!$reserve) {

            if ($user->roles_id == '2') {
                return redirect()->route('reserves.admin.index')->with('error', 'Category not found');
            } else {
                $events = Event::all();
                return redirect()->route('reserves.user.index')->with('error', 'Category not found');
            }
        }

        $reserve->event_id = $request -> event_id;
        $reserve->user_id = $request -> user_id;
        $reserve->status_id = $request -> status_id;
        $reserve->save();

        if ($user->roles_id == '2') {
            return redirect()->route('reserves.admin.index')->with('success', 'Reserva editada exitosamente.');
        } else {
            $events = Event::all();
            return redirect()->route('reserves.user.index')->with('success', 'Reserva editada exitosamente.');
        }
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
