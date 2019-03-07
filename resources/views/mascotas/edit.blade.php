<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar mascota</title>
</head>
<body>
    <form action="{{route('mascotas.update',$mascota->id)}}" method="post">
        @csrf
        @method('PUT')
        <label>Especie</label>
        <select name="especie" required>
            <option disabled value="">Elige una especie</option>
            @foreach($especies as $especie)
                <option value="{{$especie->id}}" @if($especie->id == $mascota->id_especie) selected @endif >
                    {{$especie->nombre}}
                </option>
            @endforeach
        </select>
        <br/>
        <label>Nombre</label>
        <input required type="text" name="nombre" placeholder="Nombre de la mascota" value="{{$mascota->nombre}}">
        <br/>
        <label>Precio</label>
        <input required type="text" name="precio" placeholder="Precio en pesos $$" value="{{$mascota->precio}}">
        <br/>
        <label>Fecha de nacimiento</label>
        <input required type="date" name="nacimiento" value="{{$mascota->nacimiento}}">
        <br/>
        <button type="submit">Actualizar mascota</button>
    </form>
</body>
</html>