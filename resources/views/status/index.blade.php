@extends('layouts.app')

@section('template_title')
    Status
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4" id="table">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Estados') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('statuses.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear estado') }}
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
                                        
										<th>Status</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($statuses as $status)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $status->status }}</td>

                                            <td>
                                                <form action="{{ route('statuses.destroy',$status->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('statuses.show',$status->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Detalles') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('statuses.edit',$status->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
                {!! $statuses->links() !!}
            </div>
        </div>
    </div>
@endsection
