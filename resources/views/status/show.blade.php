@extends('layouts.app')

@section('template_title')
    {{ $status->status ?? __('Show Status') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-6" id="table">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} estados</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('statuses.index') }}"> {{ __('Atras') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $status->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
