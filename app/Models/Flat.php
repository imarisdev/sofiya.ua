<?php
namespace App\Models;


class Flat extends BaseModel {

    protected $table = 'flats';

    /**
     * Планировка квартиры
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function plan() {
        return $this->belongsTo('App\Models\Plans', 'plan_id');
    }

    /**
     * Дом
     * @return mixed
     */
    public function house() {
        return $this->belongsTo('App\Models\House', 'house_id');
    }

}