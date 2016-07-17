<?php
namespace App\Models;


class Plan extends BaseModel {

    protected $table = 'plans';

    /**
     * Дом планировки
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function house() {
        return $this->belongsTo('App\Models\House', 'house_id');
    }

}