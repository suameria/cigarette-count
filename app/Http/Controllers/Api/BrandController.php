<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use App\Repositories\Api\Brand\BrandRepositoryInterface;

class BrandController extends Controller
{
    private $brandRepository;

    public function __construct(BrandRepositoryInterface $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    public function index()
    {
        return $this->brandRepository->getList();
    }

    public function create()
    {
        //
    }

    public function store(StoreBrandRequest $request)
    {
        //
    }

    public function show(Brand $brand)
    {
        //
    }

    public function edit(Brand $brand)
    {
        //
    }

    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        //
    }

    public function destroy(Brand $brand)
    {
        //
    }
}
