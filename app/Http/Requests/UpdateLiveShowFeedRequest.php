<?php

namespace App\Http\Requests;

use App\Models\LiveShowFeed;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLiveShowFeedRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('live_show_feed_edit');
    }

    public function rules()
    {
        return [
            'show_title' => [
                'string',
                'required',
            ],
            'status' => [
                'required',
            ],
            'day' => [
                'required',
            ],
            'start_time' => [
                // 'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'end_time' => [
                // 'date_format:' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
