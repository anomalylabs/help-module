<?php namespace Anomaly\HelpModule\Http\Controller\Admin;

use Anomaly\HelpModule\Category\Form\CategoryFormBuilder;
use Anomaly\HelpModule\Category\Table\CategoryTableBuilder;
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
}
