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
        'view',
    ];
}
