@extends('layouts.admin-app')
@section('custom-css')

@append

@section('content')
<div class="row">
    <div class="col-md-4  col-md-offset-1">
      <div class="box box-success">
        {!! Form::open(['action'=>['Admin\ColorsController@store']]) !!}
        <div class="box-header">
          <h3 class="box-title">Add new color</h3>

          <div class="box-tools">
            {!! Form::submit('Save', ['class' => 'btn btn-success flat']) !!}
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="form-group">
                {!! Form::label('title','Color name') !!}
                {!! Form::input('text','title', null, ['class'=>'form-control']) !!}
            </div>
        </div>
        <!-- /.box-body -->
        {!! Form::close() !!}
      </div>
      <!-- /.box -->
    </div>
    <div class="col-md-6">
      <div class="box box-danger">
        <div class="box-header">
          <h3 class="box-title">Colors</h3>

          <div class="box-tools">
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th class='text-right'>Options</th>
                    </tr>
                    @foreach($colors as $color)
                        <tr>
                            <td>{{$color->id}}</td>
                            <td id="color_{{$color->id}}">
                                <span class="read">{{$color->title}}</span>
                                {!! Form::model($color,['method'=>'PATCH','action'=>['Admin\ColorsController@update', $color->id], 'style'=>'display:none;','class'=>'editForm']) !!}
                                    <div class="input-group input-group-sm">
                                        {!! Form::input('text','title', null, ['class'=>'form-control']) !!}
                                        <span class="input-group-btn">
                                            {!! Form::submit('Save', ['class' => 'btn btn-success flat']) !!}
                                        </span>
                                    </div>
                                {!! Form::close() !!}
                            </td>
                            <td class='text-right'>
                                {!! Form::open(['method'=>'DELETE', 'action'=>['Admin\ColorsController@destroy', $color->id]]) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger flat  pull-right deleteBtn']) !!}
                                {!! Form::close() !!}
                                <a data-tg="#color_{{$color->id}}" class="btn btn-warning flat pull-right editBtn">Edit</a>
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
<script type="text/javascript">
    $(document).ready(function () {
        $('.editBtn').on('click', function (e) {
            e.preventDefault();
            var el = $($(this).data('tg'));
            el.find('.read').hide();
            el.find('.editForm').show();
        })
    })
</script>
@append