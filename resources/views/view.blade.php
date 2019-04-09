@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detalle</div>

                <div class="card-body">
                    <p><b>Fecha:</b> {{ $model->date_at}}</p>
                    <p><b>Imágenes:</b></p>
                    <div>
                        <img src="{{ asset('uploads/images/'.$model->image_1) }}">
                    </div>
                    @if(!empty($model->image_2))
                    <div>
                        <img src="{{ asset('uploads/images/'.$model->image_2) }}">
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
