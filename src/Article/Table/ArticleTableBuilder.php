<?php namespace Anomaly\HelpModule\Article\Table;

use Anomaly\HelpModule\Section\Contract\SectionInterface;
use Anomaly\Streams\Platform\Ui\Table\TableBuilder;
use Illuminate\Database\Eloquent\Builder;

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
     * The section instance.
     *
     * @var SectionInterface|null
     */
    protected $section = null;

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

    /**
     * Fired when querying.
     *
     * @param Builder $query
     */
    public function onQuerying(Builder $query)
    {
        if ($section = $this->getSection()) {
            $query->where('section_id', $section->getId());
        }
    }

    /**
     * Get the section.
     *
     * @return SectionInterface|null
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * Set the section.
     *
     * @param SectionInterface $section
     * @return $this
     */
    public function setSection(SectionInterface $section)
    {
        $this->section = $section;

        return $this;
    }
}
