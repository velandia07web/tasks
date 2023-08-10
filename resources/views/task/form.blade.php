
@extends('layouts.app')


<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Tarea') }}
            {{ Form::text('title', $task->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : '')]) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Descripciòn') }}
            {{ Form::text('description', $task->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : '')]) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Fecha entrega') }}
            {{ Form::text('end_date', $task->end_date, ['class' => 'form-control flatpickr' . ($errors->has('end_date') ? ' is-invalid' : '')]) }}
            {!! $errors->first('end_date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Desarrollador') }}
            {{ Form::text('developer', $task->developer, ['class' => 'form-control' . ($errors->has('developer') ? ' is-invalid' : '')]) }}
            {!! $errors->first('developer', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        

        <div class="form-group">
            <label for="statuses_id">Estado</label>
            <select name="statuses" id="" class="form-control" required > 
                <option value="">Selecciona un estado</option>
                @foreach ($statuses as $status)
                
                    <option value="{{ $status -> id }}">{{ $status -> status }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="start_date">Fecha de inicio</label>
            <input type="text" class="form-control flatpickr" name="start_date" >
        </div>

        <div class="form-group">
            {{ Form::label('Reporte') }}
            {{ Form::text('Report', $task->Report, ['class' => 'form-control' . ($errors->has('Report') ? ' is-invalid' : '')]) }}
            {!! $errors->first('Report', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            <label for="upload_files">Subir Archivos</label>
            <input type="file" name="upload_files" class="form-control{{ $errors->has('upload_files') ? ' is-invalid' : '' }}" required>
            @if ($errors->has('upload_files'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('upload_files') }}</strong>
                </span>
            @endif
        </div>



    </div>
    <div class="box-footer mt20">
        <button type="submit" id="button" class="btn btn-primary">{{ __('Crear') }}</button>
    </div>
</div>

