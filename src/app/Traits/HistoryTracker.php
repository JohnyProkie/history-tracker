<?php

namespace LaravelEnso\HistoryTracker\app\Traits;

trait HistoryTracker
{
    // private static $historyModel = '';

    protected static function bootHistoryTracker()
    {
        self::created(function ($model) {
            self::saveHistory($model);
        });

        self::updated(function ($model) {
            self::saveHistory($model);
        });
    }

    private static function saveHistory($model)
    {
        $history = new self::$historyModel();
        $history->fill($model->toArray());
        $model->histories()->save($history);
    }

    public function histories()
    {
        return $this->hasMany(self::$historyModel);
    }
}
