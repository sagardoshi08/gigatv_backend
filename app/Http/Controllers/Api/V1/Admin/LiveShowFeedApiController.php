<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLiveShowFeedRequest;
use App\Http\Requests\UpdateLiveShowFeedRequest;
use App\Http\Resources\Admin\LiveShowFeedResource;
use App\Models\LiveShowFeed;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LiveShowFeedApiController extends Controller
{
    // public function index()
    // {
    //     //abort_if(Gate::denies('live_show_feed_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     return new LiveShowFeedResource(LiveShowFeed::all());
    // }
    public function index()
    {

        $liveShowFeeds = LiveShowFeed::all();

        return response()->json([
            'message' => 'Live Show Feeds retrieved successfully',
            'data' => $liveShowFeeds
        ], 200); // 200 = OK
    }

    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'show_title' => 'required|string|max:255',
            'status' => 'required|integer',
            'day' => 'required|string|max:50',
            'start_time' => 'required|string|max:20',
            'end_time' => 'required|string|max:20',
        ]);


        $liveShowFeed = LiveShowFeed::create($validatedData);


        return response()->json([
            'message' => 'Live Show Feed created successfully',
            'data' => $liveShowFeed,
        ], 201);
        // $liveShowFeed = LiveShowFeed::create($request->all());
        // return (new LiveShowFeedResource($liveShowFeed))
        //     ->response()
        //     ->setStatusCode(Response::HTTP_CREATED);
    }

    // public function show(LiveShowFeed $liveShowFeed)
    // {
    //     //abort_if(Gate::denies('live_show_feed_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     return new LiveShowFeedResource($liveShowFeed);
    // }

    public function show($id)
    {

        $liveShowFeed = LiveShowFeed::findOrFail($id);

        return response()->json([
            'message' => 'Live Show Feed retrieved successfully',
            'data' => $liveShowFeed
        ], 200); // 200 = OK
    }

    // public function update(UpdateLiveShowFeedRequest $request, LiveShowFeed $liveShowFeed)
    // {
    //     $liveShowFeed->update($request->all());

    //     return (new LiveShowFeedResource($liveShowFeed))
    //         ->response()
    //         ->setStatusCode(Response::HTTP_ACCEPTED);
    // }


    public function update(Request $request, $id)
    {
        $liveShowFeed = LiveShowFeed::findOrFail($id);


        $validatedData = $request->validate([
            'show_title' => 'required|string|max:255',
            'status' => 'required|integer',
            'day' => 'required|string|max:50',
            'start_time' => 'required|string|max:20',
            'end_time' => 'required|string|max:20',
        ]);


        $liveShowFeed->update($validatedData);

        // Return a success response
        return response()->json([
            'message' => 'Live Show Feed updated successfully',
            'data' => $liveShowFeed,
        ], 202);
    }



    // public function destroy(LiveShowFeed $liveShowFeed)
    // {
    //     //abort_if(Gate::denies('live_show_feed_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     $liveShowFeed->delete();

    //     return response(null, Response::HTTP_OK);
    // }

    public function destroy($id)
    {

        $liveShowFeed = LiveShowFeed::findOrFail($id);

        $liveShowFeed->delete();


        return response()->json([
            'message' => 'Live Show Feed deleted successfully'
        ], 200); // 200 = OK
    }
}
