<?php namespace Anomaly\HelpModule\Section\Table;

use Anomaly\HelpModule\Category\Contract\CategoryInterface;
use Anomaly\Streams\Platform\Ui\Table\TableBuilder;
use Illuminate\Database\Eloquent\Builder;

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
     * The category instance.
     *
     * @var CategoryInterface|null
     */
    protected $category = null;

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
        'organize' => [
            'type' => 'primary',
            'icon' => 'fa fa-random',
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

    /**
     * Fired when querying.
     *
     * @param Builder $query
     */
    public function onQuerying(Builder $query)
    {
        if ($category = $this->getCategory()) {
            $query->where('category_id', $category->getId());
        }
    }

    /**
     * Get the category.
     *
     * @return CategoryInterface|null
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the category.
     *
     * @param CategoryInterface $category
     * @return $this
     */
    public function setCategory(CategoryInterface $category)
    {
        $this->category = $category;

        return $this;
    }
}
