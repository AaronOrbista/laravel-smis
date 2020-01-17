@can('approved_request_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.approved-requests.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.approvedRequest.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.approvedRequest.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ApprovedRequest">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.approvedRequest.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.approvedRequest.fields.control_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.approvedRequest.fields.requestor') }}
                        </th>
                        <th>
                            {{ trans('cruds.approvedRequest.fields.item') }}
                        </th>
                        <th>
                            {{ trans('cruds.approvedRequest.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.approvedRequest.fields.brand') }}
                        </th>
                        <th>
                            {{ trans('cruds.approvedRequest.fields.quantity') }}
                        </th>
                        <th>
                            {{ trans('cruds.approvedRequest.fields.unit') }}
                        </th>
                        <th>
                            {{ trans('cruds.approvedRequest.fields.price') }}
                        </th>
                        <th>
                            {{ trans('cruds.approvedRequest.fields.date_requested') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($approvedRequests as $key => $approvedRequest)
                        <tr data-entry-id="{{ $approvedRequest->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $approvedRequest->id ?? '' }}
                            </td>
                            <td>
                                {{ $approvedRequest->control_number ?? '' }}
                            </td>
                            <td>
                                {{ $approvedRequest->requestor->id_number ?? '' }}
                            </td>
                            <td>
                                {{ $approvedRequest->item->name ?? '' }}
                            </td>
                            <td>
                                {{ $approvedRequest->description->description ?? '' }}
                            </td>
                            <td>
                                {{ $approvedRequest->brand->name ?? '' }}
                            </td>
                            <td>
                                {{ $approvedRequest->quantity ?? '' }}
                            </td>
                            <td>
                                {{ $approvedRequest->unit ?? '' }}
                            </td>
                            <td>
                                {{ $approvedRequest->price ?? '' }}
                            </td>
                            <td>
                                {{ $approvedRequest->date_requested ?? '' }}
                            </td>
                            <td>
                                @can('approved_request_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.approved-requests.show', $approvedRequest->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('approved_request_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.approved-requests.edit', $approvedRequest->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('approved_request_delete')
                                    <form action="{{ route('admin.approved-requests.destroy', $approvedRequest->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('approved_request_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.approved-requests.massDestroy') }}",
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
  $('.datatable-ApprovedRequest:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection