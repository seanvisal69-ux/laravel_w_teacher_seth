@extends('layout.backend')
@section('content')
<main>
	<div class="container-fluid">
		<h1 class="mt-4">Edit Sensor</h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="/sensor">View all sensors</a></li>
			<li class="breadcrumb-item active"><a href="sensor/create">Create sensor</a></li>
		</ol>
		<div class="card mb-4">
			<div class="card-body">
                @if(Session::has('sensor_update'))
                <div class="alert alert-primary alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Primary!</strong> {!! session('sensor_update') !!}
                </div>
                @endif
                @if (count($errors) > 0)
                <!-- Form Error List -->
                <div class="alert alert-danger">
                    <strong>Something is Wrong</strong>
                    <br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                {{ Html::modelForm($sensors ,'PUT', route('sensor.update', $sensors->SensorID))->open() }}
                
                {!! Html::label('Location:','Location') !!}
                {!! Html::input('text','Location', null)->class('form-control')  !!}

                {!! Html::label('Temperature:','Temperature') !!}
                {!! Html::input('text','Temperature', null)->class('form-control')  !!}

                {!! Html::label('Humidity:','Humidity') !!}
                {!! Html::input('text','Humidity', null)->class('form-control')  !!}
                <br>
                {{ Html::submit('Update')->class('btn btn-primary') }}
                <a class="btn btn-primary" href="{!! url('/sensor')!!}">Back</a>
                {!! Html::closeModelForm() !!}
			</div>
		</div>
	</div>
</main>
@endsection