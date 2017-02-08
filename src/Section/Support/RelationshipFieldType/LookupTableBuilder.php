<?php namespace Anomaly\HelpModule\Section\Support\RelationshipFieldType;

/**
 * Class LookupTableBuilder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class LookupTableBuilder extends \Anomaly\RelationshipFieldType\Table\LookupTableBuilder
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
}
