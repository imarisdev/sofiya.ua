<?php
namespace App\Models;

use Config;

class House extends BaseModel {

    protected $table = 'houses';

    protected $plans_types = [
        1 => 'Цоколь',
        2 => 'Первый этаж',
        3 => 'Второй этаж',
        4 => 'Третий - восьмой этаж',
        5 => 'Девятый этаж',
        6 => 'Десятый этаж',
        7 => 'Двухуровневые квартиры - первый уровень',
        9 => 'Двухуровневые квартиры - второй уровень'
    ];

    /**
     * Строительный комплекс
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function complex() {
        return $this->belongsTo('App\Models\Complex', 'complex_id');
    }

    /**
     * Менеджер проекта
     * @return mixed
     */
    public function manager() {
        return $this->belongsTo('App\Models\User', 'manager_id');
    }

    /**
     * Адрес здания
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function street() {
        return $this->belongsTo('App\Models\Street', 'street_id');
    }

    /**
     * Адрес здания - кэшируемый
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function streetCache() {
        return $this->belongsTo('App\Models\Street', 'street_id')->remember(Config::get('cache.time.short'));
    }

    /**
     * Список планировок
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function plans() {
        return $this->hasMany('App\Models\Plans');
    }

    /**
     * Список планировок - кэшируемый
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function plansCache() {
        return $this->hasMany('App\Models\Plans')->remember(Config::get('cache.time.short'));
    }

    /**
     * Тип здания
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function buildingType() {
        return $this->belongsTo('App\Models\BuildingType', 'building_type');
    }

    /**
     * Картинки в медиа библиотеке
     * @return mixed
     */
    public function medialib() {
        return $this->hasMany('App\Models\Medialib', 'object_id', 'id');
    }

    /**
     * Картинки в медиа библиотеке - кэшируемый
     * @return mixed
     */
    public function medialibCache() {
        return $this->hasMany('App\Models\Medialib', 'object_id', 'id')->remember(Config::get('cache.time.short'));
    }

    /**
     * Ссылка на дом
     * @return string
     */
    public function link() {

        return "/sofievskaya-borshagovka/{$this->id}-{$this->slug}";

    }

    /**
     * @return array
     */
    public function getPlansTypes() {
        return $this->plans_types;
    }
}