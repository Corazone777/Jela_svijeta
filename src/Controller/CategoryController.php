<?php
namespace App\Controller;

use App\Model\CategoryModel;

class CategoryController
{
    protected CategoryModel $categoryModel;

    public function __construct(CategoryModel $categoryModel)
    {
        $this->categoryModel = $categoryModel;
    }

    /**
     * Return categories with requested parameters
     * "!NULL, NULL of category id"
     *
     * @param array $params $_GET parameters
     *
     * @return array|null
     */
    public function getCategory(array $params): ?array
    {
        if ($_GET['category'] === "!NULL") {
            return $this->categoryModel->selectCategory(
                [
                    'lang' => $params['lang'],
                    'category_id' => "IS NOT NULL",
                ],
            );
        } elseif ($_GET['category'] === "NULL") {
            return $this->categoryModel->selectCategory(
                [
                  'lang' => $params['lang'],
                  'category_id' => "IS NULL",
                ],
            );
        } else {
            return $this->categoryModel->selectCategory(
                [
                  'lang' => $params['lang'],
                  'category_id' => "= " . $params['category'],
                ],
            );
        }
    }
}
