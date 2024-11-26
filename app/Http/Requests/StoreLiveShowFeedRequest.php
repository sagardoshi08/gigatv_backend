<?php

namespace App\Http\Requests;

use App\Models\LiveShowFeed;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLiveShowFeedRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('live_show_feed_create');
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
               'start_time' => ['required', 'date_format:H:i'],
               'nullable',
            ],
            'end_time' => [
                 'end_time' => ['required', 'date_format:H:i'],
                'nullable',
            ],
        ];
    }
}
