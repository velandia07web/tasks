
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
            <label for="developer">Desarrollador:</label>
            <select class="form-control" name="developer">
               
                @foreach ($developers as $developer)
                    <option value="{{ $developer->id }}">{{ $developer->name }}</option>
                @endforeach
            </select>
        </div>
        
        

        <div class="form-group">
            <label for="statuses_id">Estado</label>
            <select name="statuses" id="" class="form-control" required > 
                
                @foreach ($statuses as $status)
                
                    <option value="{{ $status -> id }}">{{ $status ->status }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            {{ Form::label('Fecha entrega') }}
            {{ Form::text('start_date', $task->end_date, ['class' => 'form-control flatpickr' . ($errors->has('start_date') ? ' is-invalid' : '')]) }}
            {!! $errors->first('start_date', '<div class="invalid-feedback">:message</div>') !!}
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

