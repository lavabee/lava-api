<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TestController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            // Log headers
            Log::info('----------------------------------------------------------------- ');
            Log::info('------------------------------ START POST------------------------ ');
            Log::info('----------------------------------------------------------------- ');
            $headers = $request->headers->all();
            Log::info('Request Headers: ', $headers);

            // Log body
            $body = $request->all();
            Log::info('Request Body: ', $body);
            Log::info('----------------------------------------------------------------- ');
            Log::info('------------------------------ END POSTS------------------------ ');
            Log::info('----------------------------------------------------------------- ');
        }
        $request->merge(['new_variable' => 'value']);
        return response($request->all());
    }

    public function xmlToJson(Request $request)
    {
        return response($request->all());
    }

    public function jsonToXml(Request $request)
    {
        return response($request->all());
    }

    public function mapGateway(Request $request)
    {
        return response($request->all());
    }






}
