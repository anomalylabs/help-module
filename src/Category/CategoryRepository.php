<?php namespace Anomaly\HelpModule\Category;

use Anomaly\HelpModule\Category\Contract\CategoryInterface;
use Anomaly\HelpModule\Category\Contract\CategoryRepositoryInterface;

/**
 * Class CategoryRepository
 *
 * @link          http://pyrocms.com
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\HelpModule\Category
 */
class CategoryRepository implements CategoryRepositoryInterface
{

    /**
     * The category model.
     *
     * @var CategoryModel
     */
    protected $model;

    /**
     * Create a new CategoryRepository instance.
     *
     * @param CategoryModel $model
     */
    public function __construct(CategoryModel $model)
    {
        $this->model = $model;
    }

    /**
     * Find the category by it's slug.
     *
     * @param $slug
     * @return null|CategoryInterface
     */
    public function findBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }
}
