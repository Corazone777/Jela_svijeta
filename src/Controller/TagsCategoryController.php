<?php
namespace App\Controller;

use App\Model\TagsCategoryModel;

class TagsCategoryController
{
    protected TagsCategoryModel $tagsCategoryModel;

    public function __construct(TagsCategoryModel $tagsCategoryModel)
    {
        $this->tagsCategoryModel = $tagsCategoryModel;
    }

    /**
     * Return meals based on tags and category parameters
     *
     * @param array $params
     *
     * @return array
     */
    public function getCategoryTags(array $params): array
    {
        $locale = $params['lang'];
        $categoryID = $params['category'];
        $tagsID = $params['tags'];

        if ($params['category'] == 'NULL') {
            return $this->tagsCategoryModel->selectTagsCategory(
                [
                'lang' => $locale,
                'categoryID' => 'IS NULL',
                'tagsID' => $tagsID
                ]
            );
        }

        if ($params['category'] == '!NULL') {
            return $this->tagsCategoryModel->selectTagsCategory(
                [
                'lang' => $locale,
                'categoryID' => 'IS NOT NULL',
                'tagsID' => $tagsID
                ]
            );
        }

        return $this->tagsCategoryModel->selectTagsCategory(
            [
            'lang' => $locale,
            'categoryID' => "=".$categoryID,
            'tagsID' => $tagsID
            ]
        );
    }
}
