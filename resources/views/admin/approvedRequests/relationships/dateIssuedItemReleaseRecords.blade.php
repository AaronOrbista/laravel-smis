@can('item_release_record_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.item-release-records.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.itemReleaseRecord.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.itemReleaseRecord.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ItemReleaseRecord">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.itemReleaseRecord.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.itemReleaseRecord.fields.control_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.itemReleaseRecord.fields.received_by') }}
                        </th>
                        <th>
                            {{ trans('cruds.itemReleaseRecord.fields.claimed') }}
                        </th>
                        <th>
                            {{ trans('cruds.itemReleaseRecord.fields.date_issued') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($itemReleaseRecords as $key => $itemReleaseRecord)
                        <tr data-entry-id="{{ $itemReleaseRecord->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $itemReleaseRecord->id ?? '' }}
                            </td>
                            <td>
                                {{ $itemReleaseRecord->control_number->control_number ?? '' }}
                            </td>
                            <td>
                                {{ $itemReleaseRecord->received_by ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $itemReleaseRecord->claimed ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $itemReleaseRecord->claimed ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $itemReleaseRecord->date_issued->date_requested ?? '' }}
                            </td>
                            <td>
                                @can('item_release_record_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.item-release-records.show', $itemReleaseRecord->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('item_release_record_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.item-release-records.edit', $itemReleaseRecord->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('item_release_record_delete')
                                    <form action="{{ route('admin.item-release-records.destroy', $itemReleaseRecord->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('item_release_record_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.item-release-records.massDestroy') }}",
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
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-ItemReleaseRecord:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection