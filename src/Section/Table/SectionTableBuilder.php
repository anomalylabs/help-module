<?php namespace Anomaly\HelpModule\Section\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class SectionTableBuilder
 *
 * @link          http://pyrocms.com
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\HelpModule\Section\Table
 */
class SectionTableBuilder extends TableBuilder
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
        'category',
    ];

    /**
     * The table columns.
     *
     * @var array
     */
    protected $columns = [
        'name',
        'category',
    ];

    /**
     * The table buttons.
     *
     * @var array
     */
    protected $buttons = [
        'edit',
        'articles' => [
            'type' => 'primary',
            'icon' => 'book-open',
            'href' => 'admin/help/articles?view=&page=&filter_search=&filter_section={entry.id}',
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
