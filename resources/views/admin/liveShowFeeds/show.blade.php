@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.liveShowFeed.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.live-show-feeds.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.liveShowFeed.fields.id') }}
                        </th>
                        <td>
                            {{ $liveShowFeed->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.liveShowFeed.fields.show_title') }}
                        </th>
                        <td>
                            {{ $liveShowFeed->show_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.liveShowFeed.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\LiveShowFeed::STATUS_SELECT[$liveShowFeed->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.liveShowFeed.fields.day') }}
                        </th>
                        <td>
                            {{ App\Models\LiveShowFeed::DAY_SELECT[$liveShowFeed->day] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.liveShowFeed.fields.start_time') }}
                        </th>
                        <td>
                            {{ $liveShowFeed->start_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.liveShowFeed.fields.end_time') }}
                        </th>
                        <td>
                            {{ $liveShowFeed->end_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            live Url
                        </th>
                        <td>
                            {{ $liveShowFeed->live_url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Group Id
                        </th>
                        <td>
                            {{ $liveShowFeed->group_id }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.live-show-feeds.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
