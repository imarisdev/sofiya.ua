<?php
namespace App\Models;

use Config;

class Street extends BaseModel {

    protected $table = 'streets';

    public $timestamps = false;

    /**
     * Дома на улице
     * @return mixed
     */
    public function houses() {
        return $this->hasMany('App\Models\House');
    }

    /**
     * Дома на улице - кэшируемый
     * @return mixed
     */
    public function housesCache() {
        return $this->hasMany('App\Models\House')->remember(Config::get('cache.time.short'));
    }

    /**
     * Ссылка на улицу
     * @return string
     */
    public function link() {

        return "{$this->id}-{$this->slug}";

    }
}