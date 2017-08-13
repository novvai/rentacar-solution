<div class="form-group col-md-2">
    {!! Form::label('-','Brand') !!}
    @if(@$car)
        {!! Form::select('-', @$brandsList, @$car->brandModel->brand->id,['class'=>'form-control', 'id'=>'brandId']) !!}
    @else
        {!! Form::select('-', @$brandsList, null,['class'=>'form-control', 'id'=>'brandId']) !!}
    @endif
</div>
<div class="form-group col-md-2">
    {!! Form::label('car_brand_model_id','Model') !!}
    {!! Form::select('car_brand_model_id', [], null,['class'=>'form-control', 'id'=>'modelIds']) !!}
</div>
<div class="form-group col-md-1">
    {!! Form::label('release_date','Release date') !!}
    {!! Form::input('text', 'release_date', null,['class'=>'form-control datepicker', 'min'=>1, 'max'=>10]) !!}
</div>
<div class="form-group col-md-3">
    {!! Form::label('car_transmission_id','Transmission') !!}
    {!! Form::select('car_transmission_id', @$transmissionsList, null,['class'=>'form-control']) !!}
</div>
<div class="form-group col-md-2">
    {!! Form::label('car_color_id','Color') !!}
    {!! Form::select('car_color_id', @$colorsList, null,['class'=>'form-control']) !!}
</div>
<div class="form-group col-md-2">
    {!! Form::label('doors','Doors') !!}
    {!! Form::input('number', 'doors', null,['class'=>'form-control', 'min'=>1, 'max'=>10]) !!}
</div>


@section('page-scripts')
  <script type="text/javascript">
    $(document).ready(function () {
        var brandSelect = $('#brandId');
        var initialBrandId = brandSelect.val()
        initAjax(initialBrandId);
        brandSelect.on('change', function (e) {
            e.preventDefault()
            initAjax($(this).val(), true);
        })
        
    });
    initAjax = function (brandId, flag) {

        axios({
            method:'POST',
            url: '{{action("Admin\API\CarBrandsController@getModels")}}',
            data: {'car_brand_id' : brandId}
        }).then(function(response) {
            $('#modelIds').empty();
            $.each(response.data.modelsList, function (key, value) {
            $('#modelIds').append('<option value="'+key+'">'+value+'</option>')
            })
            if (!flag && {{@$car->id}}) {
                    $('#modelIds').val({{$car->car_brand_model_id}});
            }
        });
    }
  </script>
@append
