@extends('layouts.app')

@section('template_title')
    Task
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Task') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tasks.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                   
    <!-- ... otros datos de la tarea ... -->
    
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Title</th>
										<th>Description</th>
										<th>End Date</th>
										<th>Developer</th>
										<th>Statuses</th>
                                        <th>fecha_inicio</th>
										<th>subir_archivos</th>
                                        <th></th>
                                        <th>Tiempo restante</th>
                                        <th>Tiempo finalizacion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $task->title }}</td>
											<td>{{ $task->description }}</td>
											<td>{{ $task->end_date }}</td>
											<td>{{ $task->developer }}</td>
											<td>{{ $task->statuses }}</td>
                                            <td>{{ $task->fecha_inicio }}</td>
											<td>{{ $task->subir_archivos }}</td>

                                            <td>
                                                <form action="{{ route('tasks.destroy',$task->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('tasks.show',$task->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('tasks.edit',$task->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @if($task->subir_archivos)
                                                    <a href="{{ asset('storage/' . $task->subir_archivos) }}" target="_blank">Ver archivo</a>
                                                @endif
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                    
                                                </form>
                                            </td>

                                            <td>
                                                @php
                                                    $fechaInicio = new DateTime($task->fecha_inicio);
                                                    $fechaActual = new DateTime();
                                                    
                                                    if ($fechaInicio < $fechaActual) {
                                                        $tiempoRestante = '0';
                                                    } else {
                                                        $interval = $fechaInicio->diff($fechaActual);
                                                        $tiempoRestante = $interval->format('%a días, %h horas, %i minutos');
                                                    }
                                                @endphp
                                                {{ $tiempoRestante }}
                                            </td>

                                            <td>
                                                @php
                                                    $fechaInicio = new DateTime($task->end_date);
                                                    $fechaActual = new DateTime();
                                                    $interval = $fechaInicio->diff($fechaActual);
                                                    $Tiempofinalizacion = $interval->format('%a días, %h horas, %i minutos');
                                                @endphp
                                                {{ $Tiempofinalizacion }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $tasks->links() !!}
            </div>
        </div>
    </div>
@endsection
