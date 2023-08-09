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
                            <a href="{{ route('tasks.create') }}" class="btn btn-primary btn-sm" data-placement="left">
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

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Statuses</th>
                                    <th>Tiempo Restante</th>
                                    <th>Tiempo Finalización</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $task->title }}</td>
                                    <td>{{ $task->statuses }}</td>
                                    <td>
                                        @php
                                        $startDate = new DateTime($task->start_date);
                                        $currentDate = new DateTime();

                                        if ($startDate < $currentDate) {
                                            $timeRemaining = '0';
                                        } else {
                                            $interval = $startDate->diff($currentDate);
                                            $timeRemaining = $interval->format('%a días, %h horas, %i minutos');
                                        }
                                        @endphp
                                        {{ $timeRemaining }}
                                    </td>
                                    <td>
                                        @php
                                        $endTime = new DateTime($task->end_date);
                                        $currentDate = new DateTime();

                                        if ($endTime > $currentDate) {
                                            $timeRemaining = '0';
                                        } else {
                                            $interval = $endTime->diff($currentDate);
                                            $timeRemaining = $interval->format('%a días, %h horas, %i minutos');
                                        }
                                        @endphp
                                        {{ $timeRemaining }}
                                    </td>
                                    <td>
                                        <form action="{{ route('tasks.destroy',$task->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary" href="{{ route('tasks.show',$task->id) }}">
                                                <i class="fa fa-fw fa-eye"></i> {{ __('Show') }}
                                            </a>
                                            <a class="btn btn-sm btn-success" href="{{ route('tasks.edit',$task->id) }}">
                                                <i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}
                                            </a>
                                            @if($task->start_date)
                                            <a href="{{ asset('storage/' . $task->start_date) }}" target="_blank" class="btn btn-sm btn-info">
                                                <i class="fa fa-file-pdf"></i> Pdf
                                            </a>
                                            @endif
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}
                                            </button>
                                        </form>
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
