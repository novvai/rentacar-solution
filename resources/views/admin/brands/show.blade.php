@extends('layouts.admin-app')
@section('custom-css')

@append

@section('content')

    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Models for {{@$brand->title}}</h3>

              <div class="box-tools">
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6  table-responsive">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th>id</th>
                                        <th>Name</th>
                                        <th class="text-right">Options</th>
                                    </tr>
                                    @foreach($brand->brandModels as $model)
                                        <tr>
                                            <td> {{$model->id}} </td>
                                            <td id="model_{{$model->id}}">
                                                <span class="read">{{$model->title}}</span>
                                                {!! Form::model($model,['method'=>'PATCH','action'=>['Admin\BrandModelsController@update', $brand->id, $model->id], 'style'=>'display:none;','class'=>'editForm']) !!}
                                                    <div class="input-group input-group-sm">
                                                        {!! Form::input('text','title', null, ['class'=>'form-control']) !!}
                                                        <span class="input-group-btn">
                                                            {!! Form::submit('Save', ['class' => 'btn btn-success flat']) !!}
                                                        </span>
                                                    </div>
                                                {!! Form::close() !!}
                                            </td>
                                            <td>
                                                {!! Form::open(['method'=>'DELETE', 'action'=>['Admin\BrandModelsController@destroy',$brand->id, $model->id]]) !!}
                                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger flat  pull-right deleteBtn']) !!}
                                                {!! Form::close() !!}
                                                <a data-tg="#model_{{$model->id}}" class="btn btn-warning flat pull-right editBtn">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                    </div> <!--  .col-md-6 -->
                    <div class="col-md-6">
                        {!! Form::open(['action'=>['Admin\BrandModelsController@store', $brand->id]]) !!}
                                <div class="form-group">
                                    {!! Form::label('title','Model Name') !!}
                                    <div class="input-group input-group-sm">
                                        {!! Form::input('text','title', null, ['class'=>'form-control']) !!}
                                        <span class="input-group-btn">
                                            {!! Form::submit('Add', ['class' => 'btn btn-success flat']) !!}
                                        </span>
                                    </div>
                                </div> <!--  .form-group -->
                        {!! Form::close() !!}
                    </div> <!--  .col-md-6 -->
                </div> <!--  .row -->
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
