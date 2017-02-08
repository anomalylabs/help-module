<?php namespace Anomaly\HelpModule\Category\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class CategoryTableBuilder
 *
 * @link          http://pyrocms.com
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\HelpModule\Category\Table
 */
class CategoryTableBuilder extends TableBuilder
{

    /**
     * The table filters.
     *
     * @var array
     */
    protected $filters = [
        'search' => [
            'fields' => [
                'name',
                'description',
            ],
        ],
    ];

    /**
     * The table buttons.
     *
     * @var array
     */
    protected $buttons = [
        'edit',
        'sections' => [
            'type' => 'primary',
            'icon' => 'bookmark',
        ],
        'view'     => [
            'target' => '_blank',
        ],
    ];

    /**
     * The table actions.
     *
     * @var array
     */
    protected $actions = [
        'delete',
    ];
}
