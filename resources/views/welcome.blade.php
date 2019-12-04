@extends('layouts.app')

@section('title', 'Home page')

@section('content')

    <div class="content">
        <div class="title m-b-md">
            Laravel ТЕСТ
        </div>

        <a href="{{ route('cars') }}" class="btn btn-success">Смотреть все и добавить</a>
    </div>

@endsection
