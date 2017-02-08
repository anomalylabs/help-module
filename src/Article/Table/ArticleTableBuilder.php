<?php namespace Anomaly\HelpModule\Article\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class ArticleTableBuilder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ArticleTableBuilder extends TableBuilder
{

    /**
     * The table filters.
     *
     * @var array
     */
    protected $filters = [
        'search' => [
            'fields' => [
                'title',
                'tags',
            ],
        ],
        'section',
    ];

    /**
     * The table views.
     *
     * @var array
     */
    protected $views = [
        'all',
        'sort' => [
            'filters' => [
                'section',
            ],
            'options' => [
                'sortable' => true,
            ],
        ],
    ];

    /**
     * The table columns.
     *
     * @var array
     */
    protected $columns = [
        'article' => [
            'wrapper' => '<strong>{value.article}</strong><br><small class="text-muted">{value.category} > {value.section}</small>',
            'value'   => [
                'article'  => 'entry.title',
                'section'  => 'entry.section.name',
                'category' => 'entry.section.category.name',
            ],
        ],
        'tags'    => [
            'field' => 'tags',
            'value' => 'entry.tags.labels("tag-info")|join()',
        ],
    ];

    /**
     * The table buttons.
     *
     * @var array
     */
    protected $buttons = [
        'edit',
        'view' => [
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
