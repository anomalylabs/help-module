<?php namespace Anomaly\HelpModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

/**
 * Class HelpModule
 *
 * @link          http://pyrocms.com
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\HelpModule
 */
class HelpModule extends Module
{

    /**
     * The module icon.
     *
     * @var string
     */
    protected $icon = 'glyphicons glyphicons-book-open';

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'articles'   => [
            'buttons' => [
                'new_article',
            ],
        ],
        'sections'   => [
            'buttons' => [
                'new_section',
            ],
        ],
        'categories' => [
            'buttons' => [
                'new_category',
            ],
        ],
        'fields'     => [
            'buttons' => [
                'new_field' => [
                    'data-toggle' => 'modal',
                    'data-target' => '#modal',
                    'href'        => 'admin/help/fields/choose',
                ],
            ],
        ],
    ];

}
