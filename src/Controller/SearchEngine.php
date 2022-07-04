<?php
namespace App\Controller;

use App\Model\CategoryModel;
use App\Model\MealsModel;
use App\Model\TagsCategoryModel;
use App\Model\TagsModel;
use App\Model\WithModel;
use Lib\DiffTime;
use Lib\MetaData;
use Lib\ValidateUrl;

/**
 * Searches trough url and retrurns response based on the
 * number and value of parameters
 */
class SearchEngine
{
    protected MealsModel $mealsModel;
    protected CategoryModel $categoryModel;
    protected TagsModel $tagsModel;
    protected WithModel $withModel;
    protected TagsCategoryModel $tagsCategoryModel;

    protected MealsController $mealsController;
    protected CategoryController $categoryController;
    protected TagsController $tagsController;
    protected WithController $withController;
    protected TagsCategoryController $tagsCategoryController;

    public $count;
    public array $searchParams = ['lang', 'category', 'tags', 'with',];

    public function __construct(
        MealsModel $mealsModel,
        MealsController $mealsController,
        CategoryModel $categoryModel,
        CategoryController $categoryController,
        TagsModel $tagsModel,
        TagsController $tagsController,
        WithModel $withModel,
        WithController $withController,
        TagsCategoryModel $tagsCategoryModel,
        TagsCategoryController $tagsCategoryController
    ) {
        $this->mealsModel = $mealsModel;
        $this->mealsController = $mealsController;
        $this->categoryModel = $categoryModel;
        $this->categoryController = $categoryController;
        $this->tagsModel = $tagsModel;
        $this->tagsController = $tagsController;
        $this->withModel = $withModel;
        $this->withController = $withController;
        $this->tagsCategoryModel = $tagsCategoryModel;
        $this->tagsCategoryController = $tagsCategoryController;
    }

    /**
     * Return number of parameters passed into url
     *
     * @param array $params
     *
     * @return int
     */
    public function getParameterCount(array $params): int
    {
        foreach ($params as $key => $v) {
            if (in_array($key, $this->searchParams)) {
                $this->count += 1;
            }
        }
        return $this->count;
    }

    //!!!!!!!!!!!!!!!!!!!!!!!!!Might delete this
    public function getSearchParams(): array
    {
        $paramsHolder = [];

        foreach ($_GET as $key => $val) {
            if (in_array($key, $this->searchParams)) {
                $paramsHolder[] = $key;
            }
        }

        //unset lang because it is required
        for ($i = 0; $i < count($paramsHolder); $i++) {
            if ($paramsHolder[$i] == 'lang') {
                unset($paramsHolder[$i]);
            }
        }
        return $paramsHolder;
    }

    /**
     * Return response based on requested parameters in the url
     *
     * @param array $params $_GET parameters
     *
     * @return false|string|void
     */
    public function returnResponse(array $params)
    {
        $count = $this->getParameterCount($params);

        if (!ValidateUrl::isValidUrl()) {
            header("HTTP/1.0 404 Not Found");
            die("Not a valid request");
        }

        //Meals
        if ($count == 1) {
            $response = $this->mealsController->getMeals($_GET);
            $meta = MetaData::parser($this->mealsModel->mealsRowCount());
            $links = MetaData::getLinks($this->mealsModel->mealsRowCount());
        }

        //Meals and category
        if ($count == 2
            && isset($params['category'])
        ) {
            $response = $this->categoryController->getCategory($_GET);
            $meta = MetaData::parser($this->categoryModel->categoryRowCount());
            $links = MetaData::getLinks($this->categoryModel->categoryRowCount());
        }

        //Meals and tags
        if ($count == 2
            && isset($params['tags'])
        ) {
            $response = $this->tagsController->getTags($_GET);
            $meta = MetaData::parser($this->tagsModel->tagsRowCount());
            $links = MetaData::getLinks($this->tagsModel->tagsRowCount());
        }

        //Meals with
        if ($count == 2
            && isset($params['with'])
        ) {
            $response = $this->withController->getWith(
                $_GET,
                $this->mealsController->getMeals($_GET)
            );
            $meta = MetaData::parser($this->mealsModel->mealsRowCount());
            $links = MetaData::getLinks($this->mealsModel->mealsRowCount());
        }

        //Meals, categories and tags
        if ($count == 3
            && isset($params['category'])
            && isset($params['tags'])
        ) {
            $response = $this->tagsCategoryController->getCategoryTags($_GET);
            $meta = MetaData::parser(
                $this->tagsCategoryModel->tagsCategoryCount($_GET)
            );
            $links = MetaData::getLinks(
                $this->tagsCategoryModel->tagsCategoryCount($_GET)
            );
        }

        //Meals, with and categories
        if ($count == 3
            && isset($params['category'])
            && isset($params['with'])
        ) {
            $response = $this->withController->getWith(
                $_GET,
                $this->categoryController->getCategory($_GET)
            );
            $meta = MetaData::parser($this->categoryModel->categoryRowCount());
            $links = MetaData::getLinks($this->categoryModel->categoryRowCount());
        }

        //Meals, with and tags
        if ($count == 3
            && isset($params['tags'])
            && isset($params['with'])
        ) {
            $response = $this->withController->getWith(
                $_GET,
                $this->tagsController->getTags($_GET)
            );
            $meta = MetaData::parser($this->tagsModel->tagsRowCount());
            $links = MetaData::getLinks($this->tagsModel->tagsRowCount());
        }

        //All parameters
        if ($count == 4) {
            $response = $this->withController->getWith(
                $_GET,
                $this->tagsCategoryController->getCategoryTags($_GET)
            );
            $meta = MetaData::parser($this->tagsCategoryModel->tagsCategoryCount());
            $links = MetaData::getLinks(
                $this->tagsCategoryModel->tagsCategoryCount()
            );
        }

        $response = ['data' => $response];
        $response = array_merge($meta, $response, $links);
        return json_encode(
            $response,
            JSON_PRETTY_PRINT
            | JSON_UNESCAPED_SLASHES
            | JSON_PARTIAL_OUTPUT_ON_ERROR
        );
    }
}
