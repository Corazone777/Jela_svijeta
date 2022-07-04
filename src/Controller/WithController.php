<?php
namespace App\Controller;

use App\Model\WithModel;

class WithController
{
    protected WithModel $withModel;
    protected MealsController $mealsController;
    protected CategoryController $categoryController;
    protected TagsController $tagsController;

    public function __construct(
        WithModel $withModel,
        MealsController $mealsController,
        CategoryController $categoryController,
        TagsController $tagsController
    ) {
        $this->withModel = $withModel;
        $this->mealsController = $mealsController;
        $this->categoryController = $categoryController;
        $this->tagsController = $tagsController;
    }

    /**
     * Set "with" values: ingredients, category, tags or any variation of the three
     *
     * @param string $values Name of the table (category, ingredients or tags)
     * @param int $id  meal id
     * @return array
     */
    public function setWith(string $values, int $id): ?array
    {
        $params = $_GET;
        $locale = $params['lang'];

        $response = $this->withModel->selectWith(
            [
            'lang' => $locale,
            'cti_table' => $values,
            'id' => $id
            ]
        );

        //Display null instead of empty array
        if (empty($response)) {
            $response = "null";
        }

        return [$values => $response];
    }

    /**
     * Return response with any combination of tags, categories or ingredients
     *
     * @param array $params Values of $_GET['with]
     *
     * @param mixed $meals_id id of meals returned
     *
     * @return array
     */
    public function getWith(array $params, $meals_id): ?array
    {
        $withParams[] = explode(',', $params['with']);
        $withCount = count($withParams[0]);

        $mergedResponses = [];

        for ($i = 0; $i < count($meals_id); $i++) {
            if ($withCount == 1) {
                $response = $this->setWith($withParams[0][0], $meals_id[$i]['id']);
                $withCTI = $response;
            }

            if ($withCount == 2) {
                $responseOne = $this->setWith(
                    $withParams[0][0],
                    $meals_id[$i]['id']
                );
                $responseTwo = $this->setWith(
                    $withParams[0][1],
                    $meals_id[$i]['id']
                );

                $withCTI = array_merge($responseOne, $responseTwo);
            }

            if ($withCount == 3) {
                $responseOne = $this->setWith(
                    $withParams[0][0],
                    $meals_id[$i]['id']
                );
                $responseTwo = $this->setWith(
                    $withParams[0][1],
                    $meals_id[$i]['id']
                );
                $responseThree = $this->setWith(
                    $withParams[0][2],
                    $meals_id[$i]['id']
                );

                $withCTI = array_merge($responseOne, $responseTwo, $responseThree);
            }

            $mergedResponses = array_merge($meals_id[$i], $withCTI);
            $newArr[] = $mergedResponses;
        }
        return $newArr;
    }
}
