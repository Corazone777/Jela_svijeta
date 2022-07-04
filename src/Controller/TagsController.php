<?php
namespace App\Controller;

use App\Model\TagsModel;

class TagsController
{
    protected TagsModel $tagsModel;

    public function __construct(TagsModel $tagsModel)
    {
        $this->tagsModel = $tagsModel;
    }

    /**
     * Return meals with requested tags
     * @param array $params
     * 
     * @return array
     */
    public function getTags(array $params): array
    {
        return $this->tagsModel->selectTags(
            [
              'lang' => $params['lang'],
              'tags' => $params['tags'],
            ],
        );
    }
}
