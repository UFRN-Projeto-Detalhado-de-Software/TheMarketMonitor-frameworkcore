@extends('layouts.main')

@section('title', 'Funcionarios HOME')

@section('content')
    <div class="content">
        <h1>Crie um cargo</h1>

        <form action="{{route('cargo.store')}}" method="POST">
            @csrf
            <p>
                <label>
                    Nome:
                    <input type="text" id="nome" name="nome" placeholder="nome">
                </label>
            </p>
            <input type="submit" value="Enviar">
        </form>
    </div>

    @endsection
