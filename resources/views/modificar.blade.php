<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>MODIFICAR MANZANA</h1>
    <form action="{{ route('manzanas.actualizar', ['manzanas' => $manzanas]) }}" method="post">
        @csrf
        @method('put')


        <label for="nombre">Tipo:</label>
        <input type="text" id="tipoManzana" name="tipoManzana"><br>


        <label for="raza">Raza:</label>
        <input type="number" id="precioKilo" name="precioKilo"><br>

        <button type="submit">Actualizar</button>
</form>
</body>
</html>