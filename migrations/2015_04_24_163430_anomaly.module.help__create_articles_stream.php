<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleHelpCreateArticlesStream
 *
 * @link          http://pyrocms.com
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class AnomalyModuleHelpCreateArticlesStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'articles',
        'title_column' => 'title',
        'translatable' => true,
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'title'            => [
            'translatable' => true,
            'required'     => true,
        ],
        'slug'             => [
            'required' => true,
            'unique'   => true,
            'config'   => [
                'slugify' => 'title',
            ],
        ],
        'content'          => [
            'translatable' => true,
            'required'     => true,
        ],
        'section'          => [
            'required' => true,
        ],
        'meta_title'       => [
            'translatable' => true,
        ],
        'meta_description' => [
            'translatable' => true,
        ],
        'meta_keywords'    => [
            'translatable' => true,
        ],
        'enabled',
        'tags',
    ];

}
