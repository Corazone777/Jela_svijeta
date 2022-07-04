<?php

use App\Controller\CategoryController;
use App\Controller\MealsController;
use App\Controller\SearchEngine;
use App\Controller\TagsCategoryController;
use App\Controller\TagsController;
use App\Controller\WithController;
use App\Model\CategoryModel;
use App\Model\MealsModel;
use App\Model\TagsCategoryModel;
use App\Model\TagsModel;
use App\Model\WithModel;
use Lib\SqlConnection;

require_once 'vendor/autoload.php';

header("Content-Type: application/json; charset=utf-8");

$db = new SqlConnection();
$mealsModel = new MealsModel($db);
$categoryModel = new CategoryModel($db);
$tagsModel = new TagsModel($db);
$withModel = new WithModel($db);
$tagsCategoryModel = new TagsCategoryModel($db);

$mealsController = new MealsController($mealsModel);
$categoryController = new CategoryController($categoryModel);
$tagsController = new TagsController($tagsModel);

$withController = new WithController(
    $withModel,
    $mealsController,
    $categoryController,
    $tagsController
);

$tagsCategoryController = new TagsCategoryController($tagsCategoryModel);

$searchEngine = new SearchEngine(
    $mealsModel,
    $mealsController,
    $categoryModel,
    $categoryController,
    $tagsModel,
    $tagsController,
    $withModel,
    $withController,
    $tagsCategoryModel,
    $tagsCategoryController
);

$fullLink = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if (!filter_var($fullLink, FILTER_VALIDATE_URL)) {
    echo "Request format is wrong";
    return;
}

$response = $searchEngine->returnResponse($_GET);
echo $response;
