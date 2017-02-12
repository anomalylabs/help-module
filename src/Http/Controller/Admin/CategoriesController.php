<?php namespace Anomaly\HelpModule\Http\Controller\Admin;

use Anomaly\HelpModule\Category\Contract\CategoryInterface;
use Anomaly\HelpModule\Category\Contract\CategoryRepositoryInterface;
use Anomaly\HelpModule\Category\Form\CategoryFormBuilder;
use Anomaly\HelpModule\Category\Table\CategoryTableBuilder;
use Anomaly\HelpModule\Section\Table\SectionTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class CategoriesController
 *
 * @link          http://pyrocms.com
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\HelpModule\Http\Controller\Admin
 */
class CategoriesController extends AdminController
{

    /**
     * Return an index of existing categories.
     *
     * @param CategoryTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(CategoryTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Return a form for a new category.
     *
     * @param CategoryFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(CategoryFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Return a form for an existing category.
     *
     * @param CategoryFormBuilder $form
     * @param                     $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(CategoryFormBuilder $form, $id)
    {
        return $form->render($id);
    }

    /**
     * Redirect to a category's URL.
     *
     * @param  CategoryRepositoryInterface $categories
     * @return \Illuminate\Http\RedirectResponse
     */
    public function view(CategoryRepositoryInterface $categories)
    {
        /* @var CategoryInterface $category */
        $category = $categories->find($this->route->parameter('id'));

        return $this->redirect->to($category->route('view'));
    }

    /**
     * Organize the sections.
     *
     * @param CategoryRepositoryInterface $categories
     * @param SectionTableBuilder         $builder
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function organize(CategoryRepositoryInterface $categories, SectionTableBuilder $builder)
    {
        /* @var CategoryInterface $category */
        $category = $categories->find($this->route->parameter('id'));

        $this->breadcrumbs->add($category->getName());

        return $builder
            ->setOption('sortable', true)
            ->setCategory($category)
            ->render();
    }
}
