<?php
namespace App\Models;

use Config;

class Plans extends BaseModel {

    protected $table = 'plans';

    /**
     * Дом планировки
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function house() {
        return $this->belongsTo('App\Models\House', 'house_id');
    }

    /**
     * Дом планировки - кэшируемый
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function houseCahce() {
        return $this->belongsTo('App\Models\House', 'house_id')->remember(Config::get('cache.time.short'));
    }

}