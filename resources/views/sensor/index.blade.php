@extends('layout.backend')
@section('content')
<h1>Sensor list</h1>
<a class="btn btn-primary" href="{{ url('/sensor/create') }}">New</a>
<br><br>
@if(Session::has('sensor_delete'))
<div class="alert alert-primary alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Primary!</strong> {!! session('sensor_delete') !!}
</div>
@endif
@if (count($sensors) > 0)
<div class="panel panel-default">
    <div class="panel-heading">
        All Sensors
    </div>

    <div class="panel-body">
        <table id="myTable" class="table table-striped task-table">
            <thead>
                <tr>
                    <th>SensorID</th>
                    <th>Location</th>
                    <th>Temperature</th>
                    <th>Humidity</th>
                    <th>Recorded At</th>
                    <th>Updated At</th>
                    <th></th>
                    <th></th>
                </tr>
                
            </thead>
            <tbody>
                @foreach ($sensors as $sensor)
                <tr>
                    <td>
                        <a href="{{url('/sensor/'.$sensor->SensorID)}}">{{ $sensor->SensorID }}</a>
                    </td>
                    <td>
                        {!! $sensor->Location !!}
                    </td>
                    <td>
                        {!! $sensor->Temperature !!} °C
                    </td>
                    <td>
                        {!! $sensor->Humidity !!} %
                    </td>
                    <td>
                        {!! $sensor->created_at->format('Y-m-d H:i:s') !!}
                    </td>
                    <td>
                        {!! $sensor->updated_at->format('Y-m-d H:i:s') !!}
                    </td>
                    <td><a class="btn btn-primary" href="{!! url('sensor/' . $sensor->SensorID . '/edit') !!}">Edit</a></td>

                    <td>
                        {{ Html::form('DELETE','sensor/'. $sensor->SensorID)->open()}}
                        <button class="btn btn-danger delete">Delete</button>
                        {{ Html::form()->close() }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    new DataTable('#myTable');
    $(".delete").click(function() {
        var form = $(this).closest('form');
        $('<div></div>').appendTo('body')
            .html('<div><h6> Are you sure ?</h6></div>')
            .dialog({
                modal: true,
                title: 'Delete message',
                zIndex: 10000,
                autoOpen: true,
                width: 'auto',
                resizable: false,
                buttons: {
                    Yes: function() {
                        $(this).dialog('close');
                        form.submit();
                    },
                    No: function() {
                        $(this).dialog("close");
                        return false;
                    }
                },
                close: function(event, ui) {
                    $(this).remove();
                }
            });
        return false;
    });
</script>
@endif
@endsection