<?php
namespace App\Models;

use App\Repositories\PlansTypeRepository;
use Config;

class Plans extends BaseModel {

    protected $table = 'plans';

    protected $plansType;

    public function __construct() {
        $this->plansType = new PlansTypeRepository();
    }

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

    /**
     * Ссылка на планировку
     * @return string
     */
    public function link() {

        return "{$this->id}-{$this->slug}";

    }

    public function pathLink() {
        return "/planirovki/{$this->plansType->getPlansTypeById($this->plans_type)['slug']}/{$this->id}-{$this->slug}";
    }
}