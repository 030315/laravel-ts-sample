<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

/**
 * モデル作成・更新・保存・削除時のログ保存処理
 * NOTE: 復帰時はどのメソッドに飛ばすか…
 */
class ModelLogObserver
{
    /**
     * 新規作成前
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function creating(Model $model)
    {
        Log::debug(sprintf('creating %s %s', $model->getTable(), $this->convertAttributeToStr($model->attributesToArray())));
    }

    /**
     * 新規作成後
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function created(Model $model)
    {
        Log::debug(sprintf('created %s %s', $model->getTable(), $this->convertAttributeToStr($model->attributesToArray())));
    }

    /**
     * 更新前
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function updating(Model $model)
    {
        Log::debug(sprintf('updating %s %s', $model->getTable(), $this->convertAttributeToStr($model->attributesToArray())));
    }

    /**
     * 更新後
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function updated(Model $model)
    {
        Log::debug(sprintf('updated %s %s', $model->getTable(), $this->convertAttributeToStr($model->attributesToArray())));
    }

    /**
     * 保存前
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function saving(Model $model)
    {
        Log::debug(sprintf('saving %s %s', $model->getTable(), $this->convertAttributeToStr($model->attributesToArray())));
    }

    /**
     * 保存後
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function saved(Model $model)
    {
        Log::debug(sprintf('saved %s %s', $model->getTable(), $this->convertAttributeToStr($model->attributesToArray())));
    }

    /**
     * 削除前
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function deleting(Model $model)
    {
        Log::debug(sprintf('deleting %s %s', $model->getTable(), $this->convertAttributeToStr($model->attributesToArray())));
    }

    /**
     * 削除後
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function deleted(Model $model)
    {
        Log::debug(sprintf('deleted %s %s', $model->getTable(), $this->convertAttributeToStr($model->attributesToArray())));
    }


    /**
     * 連想配列を文字列に変換する
     * @param array $attributes
     * @return string
     */
    private function convertAttributeToStr(array $attributes)
    {
        return json_encode($attributes, JSON_UNESCAPED_UNICODE);
    }

}
