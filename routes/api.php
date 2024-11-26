<?php
Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin'], function () {
    // Live Show Feed
    Route::apiResource('live-show-feeds', 'LiveShowFeedApiController');

});
