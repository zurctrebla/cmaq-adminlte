@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
            <span class="info-box-icon bg-aqua">
                <i class="fas fa-users"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text"><a href="{{ route('users.index') }}">Usuários</a></span>
                    <span class="info-box-number">{{ $totalUsers }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
