<?php
// app/controllers/ControllerUsuarios.php
require_once 'app/Models/Usuario.php';

class ControllerUsuarios
{
    // VIEWS

    public function index()
    {
        $data = Usuario::all();
        include 'app/views/home.php';
    }

    public function create()
    {
        include 'app/views/modules/usuarios/create.php';
    }

    public function edit($id)
    {
        $item = Usuario::find($id);
        include 'app/views/modules/usuarios/edit.php';
    }

    public function show($id)
    {
        $item = Usuario::find($id);
        include 'app/views/modules/usuarios/show.php';
    }

    // ACTIONS

    public function store($request)
    {
        $item = new Usuario();

        $item->username = $request['username'];
        $item->password = $request['password'];
        $item->nombre = $request['nombre'];
        $item->primer_apellido = $request['primer_apellido'];
        $item->correo = $request['correo'];
        $item->telefono = $request['telefono'];
        $item->ruta_imagen = $request['ruta_imagen'];
        $item->activo = $request['activo'];

        $item->save();

        $this->go_home();
    }

    public function update($request, $id)
    {
        $item = Usuario::find($id);

        $item->username = $request['username'];
        $item->nombre = $request['nombre'];
        $item->primer_apellido = $request['primer_apellido'];
        $item->correo = $request['correo'];
        $item->telefono = $request['telefono'];
        $item->ruta_imagen = $request['ruta_imagen'];
        $item->activo = $request['activo'];

        $item->update();

        $this->go_home();
    }

    public function destroy($id)
    {
        $item = Usuario::find($id);
        $item->delete();
        $this->go_home();
    }

    private function go_home()
    {
        header('Location: index.php?route=usuarios');
    }
}