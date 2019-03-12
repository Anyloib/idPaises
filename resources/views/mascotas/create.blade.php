@extends('layouts.default')
@section('titulo_pagina','Mascotas | Crear mascota')
@section('titulo','Mascotas')
@section('subtitulo','Crear mascota')
@section('contenido')
    <form action="{{route('mascotas.store')}}" method="post">
        @csrf
        <label>Especie</label>
        <div class="form-group">
        <select name="especie" required>
            <option disabled selected value="">Elige una especie</option>
            @foreach($especies as $especie)
                <option value="{{$especie->id}}">
                    {{$especie->nombre}}
                </option>
            @endforeach
        </select>
        </div>

        <br/>
        <label>Nombre</label>
        <div class="form-group">
        <input required type="text" name="nombre" placeholder="Nombre de la mascota">
        </div>
        <br/>
        
        <label>Precio</label>
        <div class="form-group">
        <input required type="text" name="precio" placeholder="Precio en pesos $$">
        </div>
        <br/>
        
        <label>Fecha de nacimiento</label>
        <div class="form-group">
        <input required type="date" name="nacimiento" >
        </div>
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
                <option selected disabled value="">Elige un Estado</option>
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Crear nueva mascota</button>
        </div>

    </form>
@endsection

@section('scripts')
    <script>
    function doChangePais(event) {
        $.get("/api/estados/" + $("#slcPais").val(), function(data) {
            console.log(data);
            $("#slcEstado").empty();
            $("#slcEstado").append(
                '<option selected disabled value="">Elige un Estado</option>');
            for(var i=0; i<data.length; i++) {
                $("#slcEstado").append('<option value="' + data[i].id + '">' +
                data[i].nombre + '</option>'
                );
            }
        })
    }


    $(function() {
        $('#slcPais').change(doChangePais);
    })
    </script>
@endsection