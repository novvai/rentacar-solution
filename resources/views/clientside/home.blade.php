@extends('layouts.app')
@section('custom-css')
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
@append

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>
            Rent a car:
        </h2>
        {!! Form::open(['action'=>['Clientside\ReservationsController@store']]) !!}
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('car_id','Car') !!}
                            {!! Form::select('car_id', @$carsList, null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('for','Reservation dates') !!}
                            {!! Form::input('text','for', null, ['class'=>'form-control', 'id'=>'daterange']) !!}
                            {!! Form::hidden('reserve_from', null, ['class'=>'form-control', 'id'=>'daterange']) !!}
                            {!! Form::hidden('reserve_to', null, ['class'=>'form-control', 'id'=>'daterange']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('work_days','Total work days:') !!}
                            {!! Form::input('number','work_days', null, ['class'=>'form-control', 'readonly', 'id'=>'totalWorkDays']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('fee','Total Fee (work days x (fee per day)):') !!}
                            {!! Form::input('number','fee', null, ['class'=>'form-control', 'min'=>'0', 'readonly', 'id'=>'rentFee']) !!}
                        </div>
                    </div> <!--  .col-md-3 -->
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('first_name','First name') !!}
                            {!! Form::input('text','first_name', null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('last_name','Last name') !!}
                            {!! Form::input('text','last_name', null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('phone','Phone') !!}
                            {!! Form::input('text','phone', null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email','E-mail') !!}
                            {!! Form::input('email','email', null, ['class'=>'form-control']) !!}
                        </div>
                    </div> <!--  .col-md-3 -->
                    <div class="col-md-4">
                        <div>
                            <h4>Rent price list:</h4>
                            <ul>
                            @foreach($prices as $price)
                                <li>{{$price->title}} - {{$price->price}} Euro/day</li>
                            @endforeach
                            </ul>
                        </div>
                    </div> <!--  .col-md-3 -->
                    <div class="col-md-12 text-center">
                        {!! Form::submit('Rent', ['class' => 'btn btn-primary flat']) !!}
                    </div> <!--  .col-md-12 text-center -->
                </div> <!--  .row -->
        {!! Form::close() !!}
    </div> <!--  .col-md-12 -->
</div> <!--  .row -->
@endsection

@section('page-scripts')
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#daterange").daterangepicker(
        {
            locale: {
              format: 'YYYY-MM-DD'
            },
            minDate: '{{Carbon\Carbon::now()->format('Y-m-d')}}'
        }, 
        function(start, end, label) {
           $('[name="reserve_from"]').val(start.format('YYYY-MM-DD'))
           $('[name="reserve_to"]').val(end.format('YYYY-MM-DD'))
           axios({
                method:"POST",
                url: "{{action('Clientside\API\ReservationController@calculateReservation')}}",
                data: {'start_date': start.format('YYYY-MM-DD'), 'end_date' : end.format('YYYY-MM-DD')}
           }).then(function (response) {
               console.log(response.data.workDays)
               $('#totalWorkDays').val(response.data.workDays);
               $('#rentFee').val(response.data.rentFee);
           })
        });
    })
</script>
@append