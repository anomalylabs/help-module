<?php namespace Anomaly\HelpModule\Http\Controller;

use Anomaly\HelpModule\Article\Command\MakeArticleResponse;
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
     * Return a search of existing articles.
     *
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function search()
    {
        $this->breadcrumbs->add(
            'anomaly.module.help::breadcrumb.help',
            $this->url->route('anomaly.module.help::articles.index')
        );

        $this->breadcrumbs->add(
            'anomaly.module.help::breadcrumb.search',
            $this->url->route('anomaly.module.help::articles.search')
        );

        $this->template->set('meta_title', 'anomaly.module.help::breadcrumb.search');

        return $this->view->make('anomaly.module.help::articles/search');
    }

    /**
     * Preview a single article.
     *
     * @param ArticleRepositoryInterface $articles
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function preview(ArticleRepositoryInterface $articles, $strId)
    {
        /* @var ArticleInterface $article */
        if (!$article = $articles->findByStrId($strId)) {
            abort(404);
        }

        if ($article->isEnabled()) {
            abort(404);
        }

        $this->dispatch(new MakeArticleResponse($article));

        return $article->getResponse();
    }

    /**
     * View a single article.
     *
     * @param ArticleRepositoryInterface $articles
     * @param                            $category
     * @param                            $section
     * @param                            $slug
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function view(ArticleRepositoryInterface $articles, $category, $section, $slug)
    {
        $path = $category;
        $path .= '/' . $section;
        $path .= '/' . $slug;

        /* @var ArticleInterface $article */
        if (!$article = $articles->findByPath($path)) {
            abort(404);
        }

        if (!$article->isEnabled()) {
            abort(404);
        }

        $this->dispatch(new MakeArticleResponse($article));

        return $article->getResponse();
    }
}
