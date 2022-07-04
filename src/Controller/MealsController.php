<?php

namespace App\Controller;

use App\Model\MealsModel;

require_once __DIR__ . '/../../vendor/autoload.php';

class MealsController
{
    protected MealsModel $mealsModel;

    public function __construct(MealsModel $mealsModel)
    {
        $this->mealsModel = $mealsModel;
    }

    /**
     * Return meals on requested language
     *
     * @param array $params $_GET parameters
     *
     * @return array|null
     */
    public function getMeals(array $params): ?array
    {
        return $this->mealsModel->selectMeals(['lang' =>  $params['lang']]);
    }
}
