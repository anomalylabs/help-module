<?php namespace Anomaly\HelpModule\Http\Controller\Admin;

use Anomaly\HelpModule\Article\Form\ArticleFormBuilder;
use Anomaly\HelpModule\Article\Table\ArticleTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class ArticlesController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\HelpModule\Http\Controller\Admin
 */
class ArticlesController extends AdminController
{

    /**
     * Return an index of existing articles.
     *
     * @param ArticleTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ArticleTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Return a form for a new article.
     *
     * @param ArticleFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(ArticleFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Return a form for an existing article.
     *
     * @param ArticleFormBuilder $form
     * @param                    $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(ArticleFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
