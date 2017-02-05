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
     * The table buttons.
     *
     * @var array
     */
    protected $buttons = [
        'edit',
        'view',
    ];
}
