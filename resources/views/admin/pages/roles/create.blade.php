@extends('adminlte::page')

@section('title', 'Cadastrar Nível de Acesso')

@section('content_header')
    <h1>Cadastrar Nível de Acesso</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('roles.store') }}" class="form" method="POST">
                @csrf

                @include('admin.pages.roles._partials.form')
            </form>
        </div>
    </div>
@endsection
