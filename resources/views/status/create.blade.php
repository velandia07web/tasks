@extends('layouts.app')
<script src="{{ asset('js/app.js') }}" defer></script>


@section('template_title')
    {{ __('Create') }} Status
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-4" id="create">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} estado</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('statuses.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('status.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
