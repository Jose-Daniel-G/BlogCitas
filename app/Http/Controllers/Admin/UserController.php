<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('can:admin.user.index')->only('index');
    //     $this->middleware('can:admin.user.edit')->only('edit', 'update');
    // }
    public function index()
    {
        $usuarios = User::all();
        return view('admin.users.index', compact('usuarios'));
    }
    public function create()
    {
        return view('admin.users.create');
    }
    public function store(Request $request)
    {
        $datos = $request->all();
        return response()->json($datos);
        $request->validate([
            'name' => 'required|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|max:250|confirmed',
        ]);

        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->save();
        return redirect()->route('admin.users.index')
            ->with('info','Se registro al usuario de forma correcta')
            ->with('icono','success');
    }
    public function show(User $usuario){return view('admin.users.show', compact('usuario'));}
    
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|max:255|confirmed',
        ]);
    
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request['password']); //bcrypt($request->input('password'));
        }
        $user->save();
        
        // $user->roles()->sync($request->roles);
        // return redirect()->route('admin.users.edit', $user)->with('info', 'Se asigno los roles correctamente');
        return redirect()->route('admin.users.index')->with('info', 'Usuario actualizado exitosamente')
        ->with('icono','success');
    }

    public function destroy($id)
    {
        // $usuario->delete();
        $user = User::findOrFail($id);

        $user->delete();
        return redirect()->route('admin.users.index')->with('info', 'La usuario se eliminó con éxito')->with('icono', 'success');
    }
}
