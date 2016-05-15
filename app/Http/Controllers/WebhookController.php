<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class WebhookController extends Controller
{
    public function ebOrders(Request $request)
    {
        $data = $request->all();

        return response(json_encode($data), 200);

    }
}
