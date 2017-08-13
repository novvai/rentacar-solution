@extends('layouts.admin-app')
@section('custom-css')

@append

@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h2 class="box-title">Cars</h2>

          <div class="box-tools">
            <a href="{{action('Admin\CarsController@create')}}" class="btn btn-success flat">Add</a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th>id</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Release date</th>
                        <th>Transmission</th>
                        <th>Color</th>
                        <th>Options</th>
                    </tr>
        
                    @foreach($cars as $car)
                        <tr>
                            <td>{{$car->id}}</td>
                            <td>{{$car->brandModel->brand->title}}</td>
                            <td>{{$car->brandModel->title}}</td>
                            <td>{{$car->release_date}}</td>
                            <td>{{$car->transmission->title}}</td>
                            <td>{{$car->color->title}}</td>
                            <td>  
                                <a href="{{action('Admin\CarsController@edit', $car->id)}}" class="btn btn-warning flat">Edit</a>
                                {!! Form::open(['method' => 'DELETE', 'action' => ['Admin\CarsController@destroy', $car->id]]) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger flat deleteBtn']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
</div>
@endsection

@section('page-scripts')

@append