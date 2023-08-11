@extends('layouts.app')

@section('template_title')
    {{ $task->title ?? __('Show Task') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-6" id="table">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Detalles') }} Tareas</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tasks.index') }}">{{ __('Atras') }}</a>
                            <a class="btn btn-info" href="{{ route('tasks.viewReport', ['id' => $task->id]) }}">{{ __('Ver Reporte') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>Tarea:</strong>
                            {{ $task->title }}
                        </div>
                        <div class="form-group">
                            <strong>Descripciòn:</strong>
                            {{ $task->description }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Entrega:</strong>
                            {{ $task->end_date }}
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <strong>Desarrollador:</strong>
                                @if ($task->developer)
                                    {{ ($task->developer) }}
                                @else
                                    Sin asignar
                                @endif
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $task->status->status }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de inicio:</strong>
                            {{ $task->start_date }}
                        </div>

                              

                        <div class="form-group">
                            <strong>Archivo:</strong>
                            @if ($task->upload_files)
                            <a href="{{ Storage::url('public/' . $task->upload_files) }}" target="_blank">Ver PDF</a>
                            @else
                                <p>No se ha subido ningún archivo</p>
                            @endif
                        </div>

                        <!-- Mostrar el informe en un iframe -->
                        @if(isset($pdfContent))
                        <iframe srcdoc="{{ $pdfContent }}" width="100%" height="500px"></iframe>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
