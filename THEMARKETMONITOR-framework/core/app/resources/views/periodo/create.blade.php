<html>
<head></head>
<body>
<h1>Crie um período</h1>

<form action="{{route('periodo.store')}}" method="POST">
    @csrf
    <p>
        <label>
            Início:
            <input type="date" id="data_inicio" name="data_inicio" placeholder="{{now()}}">
        </label>
    </p>
    <p>
        Selecione um tipo de período:
        <select class="form-select" aria-label="Default select example" name="tipo">
            <option selected>Escolha o tipo do período</option>
            @foreach($tipos as $tipo)
                <option value="{{$tipo->id}}"> {{$tipo->nome}} </option>
            @endforeach
        </select>
    </p>
    <input type="submit" value="Enviar">
</form>


</body>
</html>
