@extends('layouts.app')

@section('template_title')
    {{ $developer->name ?? __('Show Developer') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-6" id="table">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Detalles') }} Desarrolladores</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('developers.index') }}"> {{ __('Atras') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $developer->name }}
                        </div>
                        <div class="form-group">
                            <strong>Numero de identidad:</strong>
                            {{ $developer->document_number }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $developer->phone }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
