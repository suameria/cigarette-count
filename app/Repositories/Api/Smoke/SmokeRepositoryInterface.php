<?php

namespace App\Repositories\Api\Smoke;

use App\Models\Smoke;
use Illuminate\Database\Eloquent\Collection;

interface SmokeRepositoryInterface
{
    /**
     * IDとユーザーIDで検索
     *
     * @param  int $id
     * @param  int $userId
     * @return Smoke
     */
    public function findByIdUserId(int $id, int $userId): Smoke|null;

    /**
     * 銘柄IDとユーザーIDで本日の喫煙本数履歴検索
     *
     * @param  int $brandId
     * @param  int $userId
     * @return Smoke
     */
    public function findTodayByBrandIdUserId(int $brandId, int $userId): Smoke|null;

    /**
     * ユーザーIDと日付で喫煙本数履歴検索
     *
     * @param  string $from
     * @param  string $to
     * @return Collection
     */
    public function getHistoryByUserIdDate(int $userId, string $from, string $to): Collection;

    /**
     * 喫煙本数保存
     *
     * @param  array $request
     * @return void
     */
    public function store(array $request): void;

    /**
     * IDで更新
     *
     * @param  int   $id
     * @param  array $request
     * @return void
     */
    public function updateById(int $id, array $request): void;
}
