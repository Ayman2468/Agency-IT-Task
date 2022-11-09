<?php

namespace App\Traits;

trait NotAllowed
{
    public function NotAllowed()
    {
        $response = [
            'status' => 200,
            'msg' => 'You are not allowed to do this',
        ];
        //if (request()->expectsJson()) {
            return response()->json($response);
        // } else {
        //     return redirect()->back()->with('message', __('msg.You are not allowed to do this'));
        // }
    }
}
