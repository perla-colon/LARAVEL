@extends('plantilla')
    @section('seccion')
        @if(session('mensaje'))
            <div class="alert alert-success">
                {{session('mensaje')}}
            </div>
        @endif
         <form action="{{route('notificacion.crear')}}" method="POST"> 
            @csrf
            @error('nombre')
            <div class="alert alert-danger">
                El nombre es obligatorio
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @enderror
            @error('telefono')
            <div class="alert alert-danger">
                El teléfono es obligatorio
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @enderror
            @error('email')
            <div class="alert alert-danger">
                El email es obligatorio
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @enderror
            @error('asunto')
            <div class="alert alert-danger">
                El asunto es obligatorio
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @enderror
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}">
            </div>
            <div class="form-group ">
                <label for="telefono">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="{{old('telefono')}}"> 
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="{{old('email')}}">
            </div>
            <div class="form-group ">
                <label for="asunto">Asunto</label>
                <input type="text" class="form-control" id="asunto" name="asunto" value="{{old('asunto')}}">
            </div>
            <button type="submit" class="btn btn-success btn-block">Submit</button>
        </form>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Teléfono</th>
                <th scope="col">email</th>
                <th scope="col">asunto</th>
                </tr>
            </thead>
            <tbody>
                @foreach($notificaciones as $item)
                <tr>
                    <td scope="col">{{$item->id}}</td>
                    <td scope="col"><a href="{{route('notificacion.detalle',$item)}}">{{$item->nombre}}</a></td>
                    <td scope="col">{{$item->telefono}}</td>
                    <td scope="col">{{$item->email}}</td>
                    <td scope="col">{{$item->asunto}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$notificaciones->links()}}
    </div>
    @endsection