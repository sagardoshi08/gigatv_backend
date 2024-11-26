<?php

namespace App\Http\Requests;

use App\Models\LiveShowFeed;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyLiveShowFeedRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('live_show_feed_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:live_show_feeds,id',
        ];
    }
}
