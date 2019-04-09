@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Subir Imagen</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (count($errors) > 0)
                        <div class="error">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{ Form::open(array('route' => 'store', 'method' => 'post', 'files' => true)) }}
                    <div class="row">
                        <div class="col-12">
                            <label>Fecha</label>
                            {!! Form::text('date', null, ['class' => 'form-control datepicker-here', 'placeholder' => 'dd/mm/yyyy', 'data-date-format' => 'dd/mm/yyyy', 'data-language'=>'en']) !!}
                            @if($errors->has('date'))
                                {{ $errors->first('date') }}
                            @endif
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label>Imagen</label>
                            {!! Form::file('image[]', [ 'multiple' => 'multiple', 'class' => 'form-control', 'id' => 'image',  'accept' => "image/*"] ) !!}
                            @if($errors->has('image'))
                                {{ $errors->first('image') }}
                            @endif
                            <div id="error-image"></div>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-12">
                            {!! Form::submit('Guardar') !!}
                        </div> 
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
<link href="{{ asset('plugins/datepicker/css/datepicker.min.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('plugins/datepicker/js/datepicker.min.js') }}"></script>
<script src="{{ asset('plugins/datepicker/js/i18n/datepicker.en.js') }}"></script>

<script type="text/javascript">
jQuery(document).ready(function($) {
    $("#image").on("change", function() {
        if($("#image")[0].files.length > 2) {
            $("#error-image").html('Sólo se puede subir 2 imágenes');
            $("#image").val('');
        } else {
            $("#error-image").html('');
            //$("#imageUploadForm").submit();
        }
    });
});
</script>
@endsection