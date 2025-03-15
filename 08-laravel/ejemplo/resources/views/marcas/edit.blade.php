<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar marca</title>
</head>
<body>
    
    <form action="{{ route('marcas.update', ["marca" => $marca -> id]) }}" method="post">
        @csrf {{-- Algo para seguridad que sin esto no funciona --}}
        {{ method_field("PUT") }} {{-- Para permitir enviar un PUT a la BBDD --}}
        <label>Marca: </label>
        <input type="text" name="marca" value="{{ $marca -> marca }}"><br><br>
        <label>Año de fundación: </label>
        <input type="number" name="ano_fundacion" value="{{ $marca -> ano_fundacion }}"><br><br>
        <label>País: </label>
        <input type="text" name="pais" value="{{ $marca -> pais }}"><br><br>
        <input type="submit" value="Editar">
        <a href="{{ route('marcas.show', ["marca" => $marca -> id]) }}">Volver</a>
    </form>
</body>
</html>