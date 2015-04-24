<?php namespace Anomaly\HelpModule\Section\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class SectionTableBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
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
        'category'
    ];

    /**
     * The table options.
     *
     * @var array
     */
    protected $options = [
        'sortable' => true
    ];

}
