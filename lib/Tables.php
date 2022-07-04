<?php

namespace Lib;

/**
 * Holds data of all tables in the database
 */
class Tables
{
    /**
     * All tables in the database
     *
     * @var array $table
     */
    public static array $tables = [
        'main'         => ['meals', 'categories', 'tags', 'ingredients'],
        'translations' => [
                           'meals_translations',
                           'category_translations',
                           'tags_translations',
                           'ingredients_translations',
                          ],
        'joins'        => ['meals_tags', 'meals_ingredients', 'meals_category'],
        'languages'    => ['languages'],
    ];

    /**
     * Columns from tables
     *
     * @var array $columns
     */
    public static array $columns = [
        'meals'                   => ['id'],
        'categories'              => ['id'],
        'ingredients'             => ['id'],
        'tags'                    => ['id'],
        'meals_translations'      => ['meals_id', 'locale', 'title', 'description'],
        'category_translations'   => ['category_id', 'locale', 'title', 'slug'],
        'ingredients_translation' => ['ingredients_id', 'locale', 'title', 'slug'],
        'tags_translations'       => ['tags_id', 'locale', 'title', 'slug'],
        'meals_category'          => ['meal_id', 'category_id'],
        'meals_ingredients'       => ['meal_id', 'ingredients_id'],
        'meals_tags'              => ['meal_id', 'tags_id'],
    ];
}
