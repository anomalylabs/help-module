<?php namespace Anomaly\HelpModule\Category\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class CategoryTableBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\HelpModule\Category\Table
 */
class CategoryTableBuilder extends TableBuilder
{

    /**
     * The table options.
     *
     * @var array
     */
    protected $options = [
        'sortable' => true
    ];

}
