<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBrandUserRequest;
use App\Http\Requests\UpdateBrandUserRequest;
use App\Models\BrandUser;
use App\Repositories\Api\BrandUser\BrandUserRepositoryInterface;

class BrandUserController extends Controller
{
    private $brandUseerRepository;

    public function __construct(BrandUserRepositoryInterface $brandUseerRepository)
    {
        $this->brandUseerRepository = $brandUseerRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->brandUseerRepository->getList();
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
    public function store(StoreBrandUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BrandUser $brandUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BrandUser $brandUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandUserRequest $request, BrandUser $brandUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BrandUser $brandUser)
    {
        //
    }
}
