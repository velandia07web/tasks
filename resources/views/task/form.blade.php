
@extends('layouts.app')


<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('title') }}
            {{ Form::text('title', $task->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('description') }}
            {{ Form::text('description', $task->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('end_date') }}
            {{ Form::text('end_date', $task->end_date, ['class' => 'form-control' . ($errors->has('end_date') ? ' is-invalid' : ''), 'placeholder' => 'End Date']) }}
            {!! $errors->first('end_date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('developer') }}
            {{ Form::text('developer', $task->developer, ['class' => 'form-control' . ($errors->has('developer') ? ' is-invalid' : ''), 'placeholder' => 'Developer']) }}
            {!! $errors->first('developer', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        

        <div class="form-group">
            <label for="statuses_id">Estados</label>
            <select name="statuses" id="" class="form-control" required > 
                @foreach ($statuses as $status)
                    <option value="{{ $status -> id }}">{{ $status -> status }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            {{ Form::label('fecha_inicio') }}
            {{ Form::text('fecha_inicio', $task->fecha_inicio, ['class' => 'form-control' . ($errors->has('fecha_inicio') ? ' is-invalid' : ''), 'placeholder' => 'fecha_inicio']) }}
            {!! $errors->first('fecha_inicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <form method="POST" action="{{ route('tasks.store') }}" enctype="multipart/form-data">
            <input type="file" name="subir_archivos">
        </form>



    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>