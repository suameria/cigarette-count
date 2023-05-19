<?php

namespace App\Repositories\Api\Brand;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BrandRepositoryInterface
{
    /**
     * ユーザーID検索
     *
     * @param  int $userId
     * @return Collection
     */
    public function getByUserId(int $userId): Collection;

    /**
     * IDとユーザーで検索
     *
     * @param  int $id
     * @param  int $userId
     * @return Model
     */
    public function findByIdUserId(int $id, int $userId): Model;

    /**
     * 保存
     *
     * @param  array $request
     * @return void
     */
    public function store(array $request): void;

    /**
     * IDとユーザーIDで更新
     *
     * @param  int   $id
     * @param  int   $userId
     * @param  array $request
     * @return void
     */
    public function updateByIdUserId(int $id, int $userId, array $request): void;

    /**
     * IDとユーザーで削除
     *
     * @param  int $id
     * @param  int $userId
     * @return void
     */
    public function deleteByIdUserId(int $id, int $userId): void;
}
