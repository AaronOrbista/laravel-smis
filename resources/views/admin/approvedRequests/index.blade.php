@extends('layouts.admin')
@section('content')
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
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-ApprovedRequest">
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
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('approved_request_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.approved-requests.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.approved-requests.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'control_number', name: 'control_number' },
{ data: 'requestor_id_number', name: 'requestor.id_number' },
{ data: 'item_name', name: 'item.name' },
{ data: 'description_description', name: 'description.description' },
{ data: 'brand_name', name: 'brand.name' },
{ data: 'quantity', name: 'quantity' },
{ data: 'unit', name: 'unit' },
{ data: 'price', name: 'price' },
{ data: 'date_requested', name: 'date_requested' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  $('.datatable-ApprovedRequest').DataTable(dtOverrideGlobals);
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
});

</script>
@endsection