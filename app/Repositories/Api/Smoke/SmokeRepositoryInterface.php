<?php

namespace App\Repositories\Api\Smoke;

use App\Models\Smoke;
use Illuminate\Database\Eloquent\Collection;

interface SmokeRepositoryInterface
{
    /**
     * 銘柄IDとユーザーIDで本日の喫煙本数履歴検索
     *
     * @param  int $brandId
     * @param  int $userId
     * @return Model|null
     */
    public function findTodayByBrandIdUserId(int $brandId, int $userId): Smoke|null;

    /**
     * 日付で喫煙本数履歴検索
     *
     * @param  string $from
     * @param  string $to
     * @return Collection
     */
    public function getHistoryByDate(string $from, string $to): Collection;

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
