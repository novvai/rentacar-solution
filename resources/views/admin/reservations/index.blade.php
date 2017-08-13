@extends('layouts.admin-app')
@section('custom-css')
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
@append

@section('content')
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
                    <div class="row">
                        <div class="form-group col-xs-3">
                            {!! Form::label('-','For Period:') !!}
                            {!! Form::input('text','-', null, ['class'=>'form-control', 'id'=>'daterange']) !!}
                        </div>
                    </div> <!--  .row -->
                {!! Form::model(@$queryData,['method'=>'GET', 'action'=>['Admin\ReservationsController@search']]) !!}
                            {!! Form::input('hidden','reserve_from', null, ['id'=>'reserveFrom']) !!}
                            {!! Form::input('hidden','reserve_to', null, ['id'=>'reserveTo']) !!}
                    <div class="row">
                        <div class="form-group col-md-2">
                            {!! Form::label('car_brand_model','Car brand - model') !!}
                            {!! Form::select('car_brand_model_id', @$brandModelsList, null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group col-md-2">
                            {!! Form::label('car_transmission','Car transmission') !!}
                            {!! Form::select('car_transmission_id', @$carTransmissionsList, null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group col-md-2">
                            {!! Form::label('release_date','Car release date') !!}
                            {!! Form::select('release_date', @$carReleaseDates, null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group col-md-2">
                            {!! Form::label('car_color','Car color') !!}
                            {!! Form::select('car_color_id', @$carColorsList, null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group col-md-2">
                            {!! Form::label('doors','Doors') !!}
                            {!! Form::input('number','doors', null, ['class'=>'form-control', 'min'=>1]) !!}
                        </div>
                        
                    </div> <!--  .row -->
                        {!! Form::submit('Search', ['class' => 'btn btn-primary flat']) !!}
                {!! Form::close() !!}
              <div class="box-tools">
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Reservations query</h3>
    
              <div class="box-tools">
                @if(@$result)
                  <h4><span>Total work days: {{$result->sum('work_days')}}</span> | <span>Total Fee: {{$result->sum('fee')}}<span></h4>
                @endif
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    @if(@$result)
                      <tbody>
                        <tr>
                            <th>id</th>
                            <th>Car</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>E-mail</th>
                            <th>Phone</th>
                            <th>From - To</th>
                            <th>Work Days</th>
                            <th>Rent Fee</th>
                            <th></th>
                        </tr>
                        @foreach($result as $reservItem)
                           <tr>
                            <td>{{$reservItem->id}}</td>
                            <td>{{$reservItem->car->full_name}}</td>
                            <td>{{$reservItem->first_name}}</td>
                            <td>{{$reservItem->last_name}}</td>
                            <td>{{$reservItem->email}}</td>
                            <td>{{$reservItem->phone}}</td>
                            <td>{{$reservItem->period}}</td>
                            <td>{{$reservItem->work_days}}</td>
                            <td>{{$reservItem->fee}}</td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                    @else
                    @endif
                </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>
@endsection

@section('page-scripts')
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#daterange").daterangepicker(
        {
            @if(@$queryData)
              'startDate' : '{{$queryData['reserve_from']}}',
              'endDate' : '{{$queryData['reserve_to']}}',
            @endif
            locale: {
              format: 'YYYY-MM-DD'
            },
        }, 
        function(start, end, label) {
            $('#reserveFrom').val(start.format('YYYY-MM-DD'))
            $('#reserveTo').val(end.format('YYYY-MM-DD'))
        });
    })
</script>
@append