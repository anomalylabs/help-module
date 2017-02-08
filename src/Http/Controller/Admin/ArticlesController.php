<?php namespace Anomaly\HelpModule\Http\Controller\Admin;

use Anomaly\HelpModule\Article\Contract\ArticleInterface;
use Anomaly\HelpModule\Article\Contract\ArticleRepositoryInterface;
use Anomaly\HelpModule\Article\Form\ArticleEntryFormBuilder;
use Anomaly\HelpModule\Article\Form\Command\AddArticleFormFromArticle;
use Anomaly\HelpModule\Article\Form\Command\AddArticleFormFromRequest;
use Anomaly\HelpModule\Article\Form\Command\AddEntryFormFromArticle;
use Anomaly\HelpModule\Article\Form\Command\AddEntryFormFromRequest;
use Anomaly\HelpModule\Article\Table\ArticleTableBuilder;
use Anomaly\HelpModule\Type\Contract\TypeRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class ArticlesController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class ArticlesController extends AdminController
{

    /**
     * Return a table of existing articles.
     *
     * @param ArticleTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ArticleTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Return the modal for choosing a article type.
     *
     * @param  TypeRepositoryInterface $types
     * @return \Illuminate\View\View
     */
    public function choose(TypeRepositoryInterface $types)
    {
        return $this->view->make('module::admin/articles/choose', ['types' => $types->all()]);
    }

    /**
     * Return the form for creating a new article.
     *
     * @param  ArticleEntryFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(ArticleEntryFormBuilder $form)
    {
        $this->dispatch(new AddEntryFormFromRequest($form));
        $this->dispatch(new AddArticleFormFromRequest($form));

        return $form->render();
    }

    /**
     * Return the form for editing an existing article.
     *
     * @param  ArticleRepositoryInterface $articles
     * @param  ArticleEntryFormBuilder $form
     * @param                                             $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(ArticleRepositoryInterface $articles, ArticleEntryFormBuilder $form, $id)
    {
        /* @var ArticleInterface $article */
        $article = $articles->find($id);

        $this->dispatch(new AddEntryFormFromArticle($form, $article));
        $this->dispatch(new AddArticleFormFromArticle($form, $article));

        return $form->render($id);
    }

    /**
     * Redirect to a article's URL.
     *
     * @param  ArticleRepositoryInterface $articles
     * @return \Illuminate\Http\RedirectResponse
     */
    public function view(ArticleRepositoryInterface $articles)
    {
        /* @var ArticleInterface $article */
        $article = $articles->find($this->route->parameter('id'));

        if (!$article->isEnabled()) {
            return $this->redirect->to($article->route('preview'));
        }

        return $this->redirect->to($article->route('view'));
    }
}
