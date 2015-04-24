<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleHelp_1_0_0_CreateArticlesStream
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModuleHelp_1_0_0_CreateArticlesStream extends Migration
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
        'locked'       => true
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'title'   => [
            'translatable' => true,
            'required'     => true
        ],
        'slug'    => [
            'required' => true,
            'unique'   => true,
            'config'   => [
                'slugify' => 'title'
            ]
        ],
        'content' => [
            'translatable' => true,
            'required'     => true
        ],
        'section' => [
            'required' => true
        ],
        'enabled',
        'promoted',
        'comments',
        'keywords'
    ];

}
