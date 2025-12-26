<?php

namespace App\Http\Controllers\brand;

use App\Http\Controllers\Controller;
use App\Services\Brand\BrandService;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    protected $brand;

    public function __construct(BrandService $brand) {$this->brand = $brand;}
}
