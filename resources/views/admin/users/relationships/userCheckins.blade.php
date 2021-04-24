@can('checkin_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.checkins.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.checkin.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.checkin.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-userCheckins">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.checkin.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.checkin.fields.datetime') }}
                        </th>
                        <th>
                            {{ trans('cruds.checkin.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.checkin.fields.location') }}
                        </th>
                        <th>
                            {{ trans('cruds.checkin.fields.lat') }}
                        </th>
                        <th>
                            {{ trans('cruds.checkin.fields.lng') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($checkins as $key => $checkin)
                        <tr data-entry-id="{{ $checkin->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $checkin->id ?? '' }}
                            </td>
                            <td>
                                {{ $checkin->datetime ?? '' }}
                            </td>
                            <td>
                                {{ $checkin->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $checkin->location->name ?? '' }}
                            </td>
                            <td>
                                {{ $checkin->lat ?? '' }}
                            </td>
                            <td>
                                {{ $checkin->lng ?? '' }}
                            </td>
                            <td>
                                @can('checkin_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.checkins.show', $checkin->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('checkin_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.checkins.edit', $checkin->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('checkin_delete')
                                    <form action="{{ route('admin.checkins.destroy', $checkin->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('checkin_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.checkins.massDestroy') }}",
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
  let table = $('.datatable-userCheckins:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection