<html>
<head></head>
<body>
<h1>Editar funcionários:</h1>

<form action="{{route('periodo.tipo.edit', ['id' => $cargo->id])}}" method="POST">
    @csrf
    @method('PUT')
    <p>
        <label>
            Nome:
            <input type="text" id="nome" name="nome" placeholder="nome" value="{{$cargo->nome}}">
        </label>
    </p>
    <input type="submit" value="Enviar">
</form>

<br>

</body>
</html>
