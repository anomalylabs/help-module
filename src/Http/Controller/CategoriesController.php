<?php namespace Anomaly\HelpModule\Http\Controller;

use Anomaly\HelpModule\Category\Contract\CategoryInterface;
use Anomaly\HelpModule\Category\Contract\CategoryRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\PublicController;

/**
 * Class CategoriesController
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class CategoriesController extends PublicController
{

    /**
     * View a single category.
     *
     * @param CategoryRepositoryInterface $categories
     * @param                             $slug
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function view(CategoryRepositoryInterface $categories, $slug)
    {
        /* @var CategoryInterface $category */
        if (!$category = $categories->findBySlug($slug)) {
            abort(404);
        }

        $this->template->set('meta_title', $category->metaTitle());
        $this->template->set('meta_description', $category->metaDescription());

        $this->breadcrumbs->add(
            'anomaly.module.help::breadcrumb.help',
            $this->url->route('anomaly.module.help::articles.index')
        );

        $this->breadcrumbs->add(
            $category->getName(),
            $category->route('view')
        );

        return $this->view->make('anomaly.module.help::categories.view', compact('category'));
    }
}
