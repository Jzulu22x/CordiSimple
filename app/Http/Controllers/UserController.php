<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\Event;
use App\Models\Reserve;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);

        return view('user.perfil',compact('user'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        if ($request->password_actual != "") {
            $NewPass = $request->password;
            $confirPass = $request->password_confirmation;

            //verificacion si la clave actual es igual a la clave del usuario en session
            if(Hash::check($request->password_actual ,$user->password)){

                if ($NewPass == $confirPass) {
                
                    if (strlen($NewPass) >= 6) {
                        $user->password = Hash::make($request->password);

                          // Actualización de la contraseña y nombre
                        DB::table('users')
                            ->where('id', $user->id)
                            ->update([
                                'password' => $user->password,
                                'name' => $request->name,
                                'last_name' => $request->last_name,
                                'email' => $request->email,
                            ]);

                        $user->save();
                        
                        return redirect()->back()->with('perfil.edit')->with('updateClave', 'Datos cambiados de forma exitosa.');
                    
                    }else{
                        return redirect()->back()->with('perfil.edit')->with('clavemenor','Oye! la clave debe ser mayor a 6 digitos.');
                    }
                }else{
                    return redirect()->back()->with('perfil.edit')->with('claveIncorrecta', 'Las contraseñas nuevas no coinciden.');
                } 
            }else{
                return redirect()->back()->with('perfil.edit')->with('error', 'La contraseña actual es incorrecta.');
            }
        }else{
            // Actualización solo del nombre
            DB::table('users')
                ->where('id', $user->id)
                ->update([
                    'name' => $request->name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                ]);
            $user->save();
            return redirect()->back()->with('perfil.edit')->with('name','el nombre fue cambiado correctamente.');
        }        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    //admin-----------------
    public function adminIndex()
    {
        $event = Event::all();
        return view('admin', compact('event'));


    }
}
