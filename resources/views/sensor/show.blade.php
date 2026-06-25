@extends('layout.backend')
@section('content')
<main>
	<div class="container-fluid">
		<h1>Show Sensors</h1>
		<div class="card">
            <div class="card-body">
                <p>SensorID: {{$sensors->SensorID}}</p>
                <p>Location: {{$sensors->Location}}</p>
                <p>Temperature: {{$sensors->Temperature}} °C</p>
                <p>Humidity: {{$sensors->Humidity}} %</p>
                <p>Created At: {{$sensors->created_at->format('Y-m-d H:i:s')}}</p>
                <p>Updated At: {{$sensors->updated_at->format('Y-m-d H:i:s')}}</p>
        <br>
        <a class="btn btn-secondary" href="{{url('/sensor')}}">Back</a>
	</div>
</main>
@endsection