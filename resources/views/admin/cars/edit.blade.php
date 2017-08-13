@extends('layouts.admin-app')
@section('custom-css')
<link rel="stylesheet" href="{{asset('css/datepicker/datepicker.css')}}" />
@append

@section('content')
    <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            {!! Form::model($car, ['method'=>'Patch', 'action'=>['Admin\CarsController@update', $car->id]]) !!}
            <div class="box-header">
              <h3 class="box-title">Update car No.: {{$car->id}}</h3>

              <div class="box-tools">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary flat']) !!}
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @include('admin.cars._form')
            </div>
            <!-- /.box-body -->
            {!! Form::close() !!}
          </div>
          <!-- /.box -->
        </div>
    </div>
@endsection

@section('page-scripts')
  <script type="text/javascript" src="{{asset('js/datepicker/bootstrap-datepicker.js')}}"></script>
  <script type="text/javascript">
    $('.datepicker').datepicker({'format':" yyyy", viewMode: 'years', minViewMode: 'years'})
  </script>
@append
