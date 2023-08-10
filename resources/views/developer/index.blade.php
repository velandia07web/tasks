@extends('layouts.app')

@section('template_title')
    Developer
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6" id="table">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Desarrolladores') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('developers.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Desarrollador') }}
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
                                        
										<th>Nombre</th>
										<th>Numero de identidad</th>
										<th>Telefono</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($developers as $developer)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $developer->name }}</td>
											<td>{{ $developer->document_number }}</td>
											<td>{{ $developer->phone }}</td>

                                            <td>
                                                <form action="{{ route('developers.destroy',$developer->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('developers.show',$developer->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Detalles') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('developers.edit',$developer->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $developers->links() !!}
            </div>
        </div>
    </div>
@endsection
