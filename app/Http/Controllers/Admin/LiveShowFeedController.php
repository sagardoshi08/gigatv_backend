<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLiveShowFeedRequest;
use App\Http\Requests\StoreLiveShowFeedRequest;
use App\Http\Requests\UpdateLiveShowFeedRequest;
use App\Models\LiveShowFeed;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LiveShowFeedController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('live_show_feed_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liveShowFeeds = LiveShowFeed::all();

        return view('admin.liveShowFeeds.index', compact('liveShowFeeds'));
    }

    public function create()
    {
        abort_if(Gate::denies('live_show_feed_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.liveShowFeeds.create');
    }

    public function store(StoreLiveShowFeedRequest $request)
    {

        $start_time = $request->start_time; // data sand
        $end_time = $request->end_time;

        $data = $request->all(); //request all

        $data['start_time'] = $start_time;
        $data['end_time'] = $end_time;

        $data = $request->validated();//validation

        $liveShowFeed = LiveShowFeed::create($data);


        return redirect()->route('admin.live-show-feeds.index');
    //     $liveShowFeed = LiveShowFeed::create($request->all());

    //     return redirect()->route('admin.live-show-feeds.index');
     }

    public function edit(LiveShowFeed $liveShowFeed)
    {
        abort_if(Gate::denies('live_show_feed_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.liveShowFeeds.edit', compact('liveShowFeed'));
    }

    public function update(UpdateLiveShowFeedRequest $request, LiveShowFeed $liveShowFeed)
    {

        $liveShowFeed->update($request->all());


        return redirect()->route('admin.live-show-feeds.index');
    }

    public function show(LiveShowFeed $liveShowFeed)
    {
        abort_if(Gate::denies('live_show_feed_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.liveShowFeeds.show', compact('liveShowFeed'));
    }

    public function destroy(LiveShowFeed $liveShowFeed)
    {
        abort_if(Gate::denies('live_show_feed_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liveShowFeed->delete();

        return back();
    }

    public function massDestroy(MassDestroyLiveShowFeedRequest $request)
    {
        $liveShowFeeds = LiveShowFeed::find(request('ids'));

        foreach ($liveShowFeeds as $liveShowFeed) {
            $liveShowFeed->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
