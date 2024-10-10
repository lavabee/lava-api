<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
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
        //return response($request->all());
    }

}
