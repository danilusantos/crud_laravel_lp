@extends('template.master')
@section('content')
    <div class="container container-fluid">
        @include('template.error')

        @include('template.grid.back', ['route' => 'computadores.list'])

        @if (Session::get('fail'))
            <div class="alert alert-danger">
                {{ Session::get('fail') }}

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        {!! Form::open([
            'route' => 'computadores.store',
            'method' => 'POST',
            'id' => 'formCadastrar',
            'class' => 'row mx-auto',
        ]) !!}

        @include('computadores.partials.form')

        {!! Form::close() !!}
    </div>
@endsection
