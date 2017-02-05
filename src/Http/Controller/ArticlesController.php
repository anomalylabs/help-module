<?php namespace Anomaly\HelpModule\Http\Controller;

use Anomaly\HelpModule\Article\Contract\ArticleInterface;
use Anomaly\HelpModule\Article\Contract\ArticleRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\PublicController;

/**
 * Class ArticlesController
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ArticlesController extends PublicController
{

    /**
     * Return an index of existing articles.
     *
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function index()
    {
        $this->breadcrumbs->add(
            'anomaly.module.help::breadcrumb.help',
            $this->url->route('anomaly.module.help::articles.index')
        );

        $this->template->set('meta_title', 'anomaly.module.help::breadcrumb.help');

        return $this->view->make('anomaly.module.help::articles/index');
    }

    /**
     * Preview a single article.
     *
     * @param ArticleRepositoryInterface $articles
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function preview(ArticleRepositoryInterface $articles)
    {
        /* @var ArticleInterface $article */
        if (!$article = $articles->findByStrId($this->route->getParameter('str_id'))) {
            abort(404);
        }

        $this->dispatch(new MakeArticleResponse($article));

        return $article->getResponse();
    }

    /**
     * View a single article.
     *
     * @param ArticleRepositoryInterface $articles
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function view(ArticleRepositoryInterface $articles)
    {
        /* @var ArticleInterface $article */
        if (!$article = $articles->findBySlug($this->route->getParameter('slug'))) {
            abort(404);
        }

        $this->dispatch(new MakeArticleResponse($article));

        return $article->getResponse();
    }
}