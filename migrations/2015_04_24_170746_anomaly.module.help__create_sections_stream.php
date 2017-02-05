<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleHelpCreateSectionsStream
 *
 * @link          http://pyrocms.com
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class AnomalyModuleHelpCreateSectionsStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'sections',
        'title_column' => 'name',
        'translatable' => true,
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'name'        => [
            'translatable' => true,
            'required'     => true,
            'unique'       => true,
        ],
        'slug'        => [
            'required' => true,
            'unique'   => true,
            'config'   => [
                'slugify' => 'name',
            ],
        ],
        'description' => [
            'translatable' => true,
        ],
        'category'    => [
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
    ];

}
