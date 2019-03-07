@extends('layouts.default')
@section('titulo_pagina','Mascotas | Crear mascota')
@section('titulo','Mascotas')
@section('subtitulo','Crear mascota')
@section('contenido')
    <form action="{{route('mascotas.store')}}" method="post">
        @csrf
        <label>Especie</label>
        <select name="especie" required>
            <option disabled selected value="">Elige una especie</option>
            @foreach($especies as $especie)
                <option value="{{$especie->id}}">
                    {{$especie->nombre}}
                </option>
            @endforeach
        </select>
        <br/>
        <label>Nombre</label>
        <input required type="text" name="nombre" placeholder="Nombre de la mascota">
        <br/>
        <label>Precio</label>
        <input required type="text" name="precio" placeholder="Precio en pesos $$">
        <br/>
        <label>Fecha de nacimiento</label>
        <input required type="date" name="nacimiento" >
        <br/>
       
        
        <div class="form-group">
            <label class="control-label">Pais</label>
            <select class="form-control" name="pais" id="slcPais" required>
                <option selected disabled value="">Elige un pais</option>
                @foreach($paises as $pais)
                    <option value="{{$pais->id}}">{{$pais->nombre}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="control-label">Estado</label>
            <select class="form-control" name="estado" id="slcEstado" required>
                <option selected disabled value="">Elige un stado</option>
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Crear nueva mascota</button>
        </div>

    </form>
@endsection

@section('scripts')
    <script>
    function $doChangePais(event) {
        $.get("/api/estados/" + $("#slPais").val(), function(data) {
            console.log(data);
        })
    }


    $(function() {
        $('#slcPais').change($doChangePais);
    })
    </script>
@endsection