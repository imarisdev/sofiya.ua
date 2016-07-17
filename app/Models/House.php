<?php
namespace App\Models;


class House extends BaseModel {

    protected $table = 'houses';

    /**
     * Строительный комплекс
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function complex() {
        return $this->belongsTo('App\Models\Complex', 'complex_id');
    }

    /**
     * Адрес здания
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function street() {
        return $this->belongsTo('App\Models\Street', 'street_id');
    }

    /**
     * Список планировок
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function plans() {
        return $this->hasMany('App\Models\Plan');
    }

    /**
     * Тип здания
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function buildingType() {
        return $this->belongsTo('App\Models\BuildingType', 'building_type');
    }
}