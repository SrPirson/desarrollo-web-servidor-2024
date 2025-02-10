<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coches</title>
</head>
<body>
    
    <h1>Lista de coches</h1>

    <table>
        <thead>
            <tr>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($coches as $coche)
            <tr>
                <th>{{ $coche[0] }}</th>
                <th>{{ $coche[1] }}</th>
                <th>{{ $coche[2] }}</th>
            </tr>
            @endforeach
    </tbody>
    </table>

</body>
</html>