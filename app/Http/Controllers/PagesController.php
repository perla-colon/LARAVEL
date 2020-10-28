<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;
class PagesController extends Controller
{
    //
    public function inicio(){
        $notificaciones = App\Notificaciones::paginate(10);
        return view('welcome',compact('notificaciones'));
    }

    public function index(Request  $request)
    {

        $notificaciones = App\Notificaciones::paginate(10);
        return view('welcome',compact('notificaciones'));
    }
    public function muestra(){
        return App\Notificaciones::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required',
            'telefono'=>'required',
            'email'=>'required',
            'asunto'=>'required']);
        $nuevaNotificacion = new App\Notificaciones;
        $nuevaNotificacion->nombre = $request->nombre;
        $nuevaNotificacion->telefono = $request->telefono;
        $nuevaNotificacion->email = $request->email;
        $nuevaNotificacion->asunto = $request->asunto;
        $nuevaNotificacion->created_at = date('Y-m-d H:i:m');

        $nuevaNotificacion->save();

        return $nuevaNotificacion;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notificaciones =  App\Notificaciones::findOrFail($id);
        return view('notificaciones.detalle',compact('notificaciones'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
