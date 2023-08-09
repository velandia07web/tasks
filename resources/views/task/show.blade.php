@extends('layouts.app')

@section('template_title')
    {{ $task->name ?? "{{ __('Show') Task" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Task</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tasks.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $task->title }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $task->description }}
                        </div>
                        <div class="form-group">
                            <strong>End Date:</strong>
                            {{ $task->end_date }}
                        </div>
                        <div class="form-group">
                            <strong>Developer:</strong>
                            {{ $task->developer }}
                        </div>
                        <div class="form-group">
                            <strong>Statuses:</strong>
                            {{ $task->statuses }}
                        </div>
                        <div class="form-group">
                            <strong>Statuses:</strong>
                            {{ $task->start_date }}
                        </div>
                        <div class="form-group">
                            <strong>Statuses:</strong>
                            {{ $task->upload_files }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
