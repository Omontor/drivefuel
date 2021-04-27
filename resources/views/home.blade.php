@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

   <h2>Checkins y Checkouts</h2>                             
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
    var markers = [

@forelse($checkins as $checkin)
    {     

        "title": '{{ \App\Models\User::where(['id' => $checkin->user_id])->first()->name }}',
        "lat": '{{$checkin->lat}}',
        "lng": '{{$checkin->lng}}',
        "description": ' {{ \App\Models\User::where(['id' => $checkin->user_id])->first()->name }} | {{$checkin->created_at->diffForHumans()}}  Checkin',

    },

    @empty
    {     

        "title": 'No records',
        "lat": '0',
        "lng": '0',
        "description": 'No records'
    },
    @endforelse


    ];


    var checkoutmarkers = [
    @forelse($checkouts as $checkin)
    {     

        "title": '{{ \App\Models\User::where(['id' => $checkin->user_id])->first()->name }}',
        "lat": '{{$checkin->lat}}',
        "lng": '{{$checkin->lng}}',
        "description": ' {{ \App\Models\User::where(['id' => $checkin->user_id])->first()->name }} | {{$checkin->created_at->diffForHumans()}}  Checkin'
    },

    @empty
    {     

        "title": 'No Checkouts',
        "lat": '0',
        "lng": '0',
        "description": 'No Checkouts'
    },
    @endforelse
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
                icon: {                             
  url: "http://maps.google.com/mapfiles/ms/icons/green-dot.png"                           }
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


        for (var i = 0; i < checkoutmarkers.length; i++) {
            var data = checkoutmarkers[i]
            var myLatlng = new google.maps.LatLng(data.lat, data.lng);
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: data.title,
                icon: {                             
  url: "http://maps.google.com/mapfiles/ms/icons/red-dot.png"                           }
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


                    <div class="row">
                        <div class="{{ $settings1['column_class'] }}">
                            <div class="card text-white bg-success">
                                <div class="card-body pb-0">
                                    <div class="text-value">{{ number_format($settings1['total_number']) }}</div>
                                    <div>{{ $settings1['chart_title'] }}</div>
                                    <br />
                                </div>
                            </div>
                        </div>
                        <div class="{{ $settings2['column_class'] }}">
                            <div class="card text-white bg-success">
                                <div class="card-body pb-0">
                                    <div class="text-value">{{ number_format($settings2['total_number']) }}</div>
                                    <div>{{ $settings2['chart_title'] }}</div>
                                    <br />
                                </div>
                            </div>
                        </div>
                        <div class="{{ $settings3['column_class'] }}">
                            <div class="card text-white bg-success">
                                <div class="card-body pb-0">
                                    <div class="text-value">{{ number_format($settings3['total_number']) }}</div>
                                    <div>{{ $settings3['chart_title'] }}</div>
                                    <br />
                                </div>
                            </div>
                        </div>
                        <div class="{{ $settings4['column_class'] }}">
                            <div class="card text-white bg-success">
                                <div class="card-body pb-0">
                                    <div class="text-value">{{ number_format($settings4['total_number']) }}</div>
                                    <div>{{ $settings4['chart_title'] }}</div>
                                    <br />
                                </div>
                            </div>
                        </div>
                        <div class="{{ $settings5['column_class'] }}">
                            <div class="card text-white bg-success">
                                <div class="card-body pb-0">
                                    <div class="text-value">{{ number_format($settings5['total_number']) }}</div>
                                    <div>{{ $settings5['chart_title'] }}</div>
                                    <br />
                                </div>
                            </div>
                        </div>
                        <div class="{{ $settings6['column_class'] }}">
                            <div class="card text-white bg-success">
                                <div class="card-body pb-0">
                                    <div class="text-value">{{ number_format($settings6['total_number']) }}</div>
                                    <div>{{ $settings6['chart_title'] }}</div>
                                    <br />
                                </div>
                            </div>
                        </div>
                        <div class="{{ $settings7['column_class'] }}">
                            <div class="card text-white bg-success">
                                <div class="card-body pb-0">
                                    <div class="text-value">{{ number_format($settings7['total_number']) }}</div>
                                    <div>{{ $settings7['chart_title'] }}</div>
                                    <br />
                                </div>
                            </div>
                        </div>
                        <div class="{{ $settings8['column_class'] }}">
                            <div class="card text-white bg-success">
                                <div class="card-body pb-0">
                                    <div class="text-value">{{ number_format($settings8['total_number']) }}</div>
                                    <div>{{ $settings8['chart_title'] }}</div>
                                    <br />
                                </div>
                            </div>
                        </div>
                        <div class="{{ $chart9->options['column_class'] }}">
                            <h3>{!! $chart9->options['chart_title'] !!}</h3>
                            {!! $chart9->renderHtml() !!}
                        </div>
                        <div class="{{ $chart10->options['column_class'] }}">
                            <h3>{!! $chart10->options['chart_title'] !!}</h3>
                            {!! $chart10->renderHtml() !!}
                        </div>
                        <div class="{{ $settings11['column_class'] }}">
                            <div class="card text-white bg-success">
                                <div class="card-body pb-0">
                                    <div class="text-value">{{ number_format($settings11['total_number']) }}</div>
                                    <div>{{ $settings11['chart_title'] }}</div>
                                    <br />
                                </div>
                            </div>
                        </div>
                        <div class="{{ $settings12['column_class'] }}">
                            <div class="card text-white bg-success">
                                <div class="card-body pb-0">
                                    <div class="text-value">{{ number_format($settings12['total_number']) }}</div>
                                    <div>{{ $settings12['chart_title'] }}</div>
                                    <br />
                                </div>
                            </div>
                        </div>
                        <div class="{{ $chart13->options['column_class'] }}">
                            <h3>{!! $chart13->options['chart_title'] !!}</h3>
                            {!! $chart13->renderHtml() !!}
                        </div>
                        {{-- Widget - latest entries --}}
                        <div class="{{ $settings14['column_class'] }}" style="overflow-x: auto;">
                            <h3>{{ $settings14['chart_title'] }}</h3>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        @foreach($settings14['fields'] as $key => $value)
                                            <th>
                                                {{ trans(sprintf('cruds.%s.fields.%s', $settings14['translation_key'] ?? 'pleaseUpdateWidget', $key)) }}
                                            </th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($settings14['data'] as $entry)
                                        <tr>
                                            @foreach($settings14['fields'] as $key => $value)
                                                <td>
                                                    @if($value === '')
                                                        {{ $entry->{$key} }}
                                                    @elseif(is_iterable($entry->{$key}))
                                                        @foreach($entry->{$key} as $subEentry)
                                                            <span class="label label-info">{{ $subEentry->{$value} }}</span>
                                                        @endforeach
                                                    @else
                                                        {{ data_get($entry, $key . '.' . $value) }}
                                                    @endif
                                                </td>
                                            @endforeach
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="{{ count($settings14['fields']) }}">{{ __('No entries found') }}</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>{!! $chart9->renderJs() !!}{!! $chart10->renderJs() !!}{!! $chart13->renderJs() !!}
@endsection