<?php

namespace App\Http\Controllers;

use App\Http\Requests\Usuario\StoreUsuarioRequest;
use App\Http\Requests\Usuario\UpdateUsuarioRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Establece los middleware necesarios para gestionar permisos
     * Se utilizan permisos específicos para cada acción del controlador.
     */
    function __construct()
    {
        $this->middleware('permission:Usuarios Listar|Usuarios Crear|Usuarios Editar|Usuarios Eliminar', ['only' => ['index', 'show']]);
        $this->middleware('permission:Usuarios Crear', ['only' => ['create', 'store']]);
        $this->middleware('permission:Usuarios Editar', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Usuarios Eliminar', ['only' => ['destroy']]);
        $this->middleware('permission:Usuarios Asignar Roles', ['only' => ['asignarrolevista', 'asignarrole']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('usuarios.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('usuarios.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsuarioRequest $request)
    {
        $usuario = User::create([
            'name' => $request->name,
            'nickname' => $request->nickname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $usuario->assignRole($request->input('roles'));

        return redirect()->route('usuarios.index')->with('success', 'Usuario Creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $usuario)
    {
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $usuario->roles->pluck('name', 'name')->all();

        return view('usuarios.edit', compact('usuario', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsuarioRequest $request, User $usuario)
    {
        $input = $request->except(['password']);

        // Si se proporciona una nueva contraseña, la encripta y la agrega al array
        if (!empty($request->password)) {
            $input['password'] = Hash::make($request->password);
        }

        $usuario->update($input);

        // Verifica si el usuario tiene roles y actualiza sin eliminar directamente
        if ($request->has('roles')) {
            $usuario->syncRoles($request->input('roles'));
        }

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario eliminado exitosamente');
    }
}
