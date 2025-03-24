<?php
// app/controllers/ControllerReservacion.php
require_once 'app/Models/Reservacion.php';

class ControllerReservacion
{
    // VISTAS

    public function index()
    {
        $data = Reservacion::all();
        include 'app/views/reservacion/index.php';
    }

    public function reservar()
    {
        include 'app/Views/reservacion/reservacion.php';
    }

    public function edit($id)
    {
        $reservacion = Reservacion::find($id);
        include 'app/views/reservaciones/edit.php';
    }

    public function show($id)
    {
        $reservacion = Reservacion::find($id);
        include 'app/views/reservaciones/show.php';
    }

    // ACCIONES

    public function store($request)
    {
        $reservacion = new Reservacion();

        $reservacion->id_usuario = $request['id_usuario'];
        $reservacion->id_canton = $request['id_canton'];
        $reservacion->id_categoria = $request['id_categoria'];
        $reservacion->fecha_inicio = $request['fecha_inicio'];
        $reservacion->fecha_fin = $request['fecha_fin'];
        $reservacion->numero_personas = $request['numero_personas'];
        $reservacion->total = $request['total'];
        $reservacion->estado = 'pendiente';

        $reservacion->save();

        header('Location: index.php?route=reservaciones');
    }

    public function update($request, $id)
    {
        $reservacion = Reservacion::find($id);
        
        $reservacion->id_usuario = $request['id_usuario'];
        $reservacion->id_canton = $request['id_canton'];
        $reservacion->id_categoria = $request['id_categoria'];
        $reservacion->fecha_inicio = $request['fecha_inicio'];
        $reservacion->fecha_fin = $request['fecha_fin'];
        $reservacion->numero_personas = $request['numero_personas'];
        $reservacion->total = $request['total'];
        $reservacion->estado = $request['estado'];

        $reservacion->update();

        header('Location: index.php?route=reservaciones');
    }

    public function destroy($id)
    {
        $reservacion = Reservacion::find($id);
        $reservacion->delete();

        header('Location: index.php?route=reservaciones');
    }
}