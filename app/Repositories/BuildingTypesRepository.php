<?php
namespace App\Repositories;

use App\Models\BuildingTypes;
use Response;

class BuildingTypesRepository extends BaseRepository {

    public function __construct(BuildingTypes $building_types) {

        $this->model = $building_types;

    }

    /**
     * Отдает список типов домов
     * @return array
     */
    public function getTypesForSelect() {

        $building_types = $this->model->all();

        $building_types_list = array();

        foreach($building_types as $type) {
            $building_types_list[$type->id] = $type->title;
        }

        return $building_types_list;

    }

}