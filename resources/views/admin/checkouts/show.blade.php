@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.checkout.title') }}
    </div>

    <div class="card-body">


<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
    var markers = [

    {     

        "title": '{{ \App\Models\User::where(['id' => $checkout->user_id])->first()->name }}',
        "lat": '{{$checkout->lat}}',
        "lng": '{{$checkout->lng}}',
        "description": ' {{ \App\Models\User::where(['id' => $checkout->user_id])->first()->name }} | {{$checkout->created_at->diffForHumans()}}  Checkin',

    },



    ];


    window.onload = function () {
        LoadMap();
    }
    function LoadMap() {
        var mapOptions = {
            center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
            // zoom: 8, //Not required.
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var infoWindow = new google.maps.InfoWindow();
        var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
 
        //Create LatLngBounds object.
        var latlngbounds = new google.maps.LatLngBounds();
 
        for (var i = 0; i < markers.length; i++) {
            var data = markers[i]
            var myLatlng = new google.maps.LatLng(data.lat, data.lng);
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: data.title,
              
            });
            (function (marker, data) {
                google.maps.event.addListener(marker, "click", function (e) {
                    infoWindow.setContent("<div style = 'width:200px;min-height:40px'>" + data.description + "</div>");
                    infoWindow.open(map, marker);
                });
            })(marker, data);
 
            //Extend each marker's position in LatLngBounds object.
            latlngbounds.extend(marker.position);
        }        

 
        //Get the boundaries of the Map.
        var bounds = new google.maps.LatLngBounds();
 
        //Center map and adjust Zoom based on the position of all markers.
        map.setCenter(latlngbounds.getCenter());
        map.fitBounds(latlngbounds);
    }
</script>
<div id="dvMap" style="width: 100%; height:550px;">
</div>

<br>

<script async defer
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-VZUr01EdXUPZfUcj_UilKvo1DjmfGG0&callback=initMap">
                        </script>



        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.checkouts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.checkout.fields.id') }}
                        </th>
                        <td>
                            {{ $checkout->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.checkout.fields.datetime') }}
                        </th>
                        <td>
                            {{ $checkout->datetime }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.checkout.fields.user') }}
                        </th>
                        <td>
                            {{ $checkout->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.checkout.fields.location') }}
                        </th>
                        <td>
                            {{ $checkout->location->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.checkout.fields.lat') }}
                        </th>
                        <td>
                            {{ $checkout->lat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.checkout.fields.lng') }}
                        </th>
                        <td>
                            {{ $checkout->lng }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.checkouts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection