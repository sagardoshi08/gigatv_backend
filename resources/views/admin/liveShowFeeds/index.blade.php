@extends('layouts.admin')
@section('content')
@can('live_show_feed_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.live-show-feeds.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.liveShowFeed.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.liveShowFeed.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-LiveShowFeed">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.liveShowFeed.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.liveShowFeed.fields.show_title') }}
                        </th>
                        <th>
                            {{ trans('cruds.liveShowFeed.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.liveShowFeed.fields.day') }}
                        </th>
                        <th>
                            {{ trans('cruds.liveShowFeed.fields.start_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.liveShowFeed.fields.end_time') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($liveShowFeeds as $key => $liveShowFeed)
                        <tr data-entry-id="{{ $liveShowFeed->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $liveShowFeed->id ?? '' }}
                            </td>
                            <td>
                                {{ $liveShowFeed->show_title ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\LiveShowFeed::STATUS_SELECT[$liveShowFeed->status] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\LiveShowFeed::DAY_SELECT[$liveShowFeed->day] ?? '' }}
                            </td>
                            <td>
                                {{ $liveShowFeed->start_time ?? '' }}
                            </td>
                            <td>
                                {{ $liveShowFeed->end_time ?? '' }}
                            </td>
                            <td>
                                @can('live_show_feed_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.live-show-feeds.show', $liveShowFeed->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('live_show_feed_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.live-show-feeds.edit', $liveShowFeed->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('live_show_feed_delete')
                                    <form action="{{ route('admin.live-show-feeds.destroy', $liveShowFeed->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('live_show_feed_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.live-show-feeds.massDestroy') }}",
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
  let table = $('.datatable-LiveShowFeed:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection