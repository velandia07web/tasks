@extends('layouts.app')

@section('template_title')
    {{ __('Reporte de Tarea') }}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Ver Reporte de Tarea') }}</div>
                    <div class="card-body">
                        <form action="{{ route('tasks.updateReport', ['id' => $task->id]) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="report">Reporte:</label>
                                <textarea class="form-control" name="Report" rows="5">{{ $task->Report }}</textarea>
                            </div>

                            <button type="submit" id="buttonReport" class="btn btn-primary">{{ __('Editar reporte') }}</button>
                            <a href="{{ route('tasks.show', ['task' => $task->id]) }}"  id="buttonReport" class="btn btn-secondary">{{ __('Cancelar') }}</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
