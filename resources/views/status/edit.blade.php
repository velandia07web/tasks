@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Status
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-4" id="create">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Editar') }} estado</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('statuses.update', $status->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('status.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
