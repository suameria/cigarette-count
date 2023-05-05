<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSmokeRequest;
use App\Http\Requests\UpdateSmokeRequest;
use App\Models\Smoke;
use App\Repositories\Api\Smoke\SmokeRepositoryInterface;

class SmokeController extends Controller
{
    private $smokeRepository;

    public function __construct(SmokeRepositoryInterface $smokeRepository)
    {
        $this->smokeRepository = $smokeRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->smokeRepository->getList();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSmokeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Smoke $smoke)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Smoke $smoke)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSmokeRequest $request, Smoke $smoke)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Smoke $smoke)
    {
        //
    }
}
