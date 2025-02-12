<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marcas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <h1>Lista de marcas</h1>

        <table class="table text-center table-bordered border-secundary table-hover table-light">
            <thead class="table-dark">
                <tr>
                    <th>Marca</th>
                    <th>Año de fundación</th>
                    <th>País</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($marcas as $marca)
                    <tr>
                        <td><a href="/marcas/{{ $marca -> id }}">{{ $marca -> marca }}</a></td>
                        <td>{{ $marca -> ano_fundacion }}</td>
                        <td>{{ $marca -> pais }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>