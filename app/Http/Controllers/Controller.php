<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected function resJson($data) {
        return response()->json($data);
    }
}
