@extends('layouts.admin')
@section('content')
@can('checkout_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.checkouts.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.checkout.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Checkout', 'route' => 'admin.checkouts.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.checkout.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
    var markers = [

@forelse($checkouts as $checkin)
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




        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Checkout">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.checkout.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.checkout.fields.datetime') }}
                        </th>
                        <th>
                            {{ trans('cruds.checkout.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.checkout.fields.location') }}
                        </th>
                        <th>
                            {{ trans('cruds.checkout.fields.lat') }}
                        </th>
                        <th>
                            {{ trans('cruds.checkout.fields.lng') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($users as $key => $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($locations as $key => $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($checkouts as $key => $checkout)
                        <tr data-entry-id="{{ $checkout->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $checkout->id ?? '' }}
                            </td>
                            <td>
                                {{ $checkout->datetime ?? '' }}
                            </td>
                            <td>
                                {{ $checkout->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $checkout->location->name ?? '' }}
                            </td>
                            <td>
                                {{ $checkout->lat ?? '' }}
                            </td>
                            <td>
                                {{ $checkout->lng ?? '' }}
                            </td>
                            <td>
                                @can('checkout_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.checkouts.show', $checkout->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('checkout_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.checkouts.edit', $checkout->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('checkout_delete')
                                    <form action="{{ route('admin.checkouts.destroy', $checkout->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('checkout_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.checkouts.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Checkout:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection