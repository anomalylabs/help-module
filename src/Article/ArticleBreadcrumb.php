<?php namespace Anomaly\HelpModule\Article;

use Anomaly\HelpModule\Article\Contract\ArticleInterface;
use Anomaly\Streams\Platform\Ui\Breadcrumb\BreadcrumbCollection;
use Illuminate\Http\Request;

/**
 * Class ArticleBreadcrumb
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class ArticleBreadcrumb
{

    /**
     * The request object.
     *
     * @var Request
     */
    protected $request;

    /**
     * The breadcrumb collection.
     *
     * @var BreadcrumbCollection
     */
    protected $breadcrumbs;

    /**
     * Create a new ArticleBreadcrumb instance.
     *
     * @param Request              $request
     * @param BreadcrumbCollection $breadcrumbs
     */
    public function __construct(Request $request, BreadcrumbCollection $breadcrumbs)
    {
        $this->request     = $request;
        $this->breadcrumbs = $breadcrumbs;
    }

    /**
     * Make the article breadcrumbs.
     *
     * @param ArticleInterface $article
     */
    public function make(ArticleInterface $article)
    {
        $breadcrumbs = [
            $article->getTitle() => $this->request->path(),
        ];

        $this->loadParent($article, $breadcrumbs);

        foreach (array_reverse($breadcrumbs) as $key => $url) {
            $this->breadcrumbs->add($key, $url);
        }
    }

    /**
     * Load the parent breadcrumbs.
     *
     * @param ArticleInterface $article
     * @param array         $breadcrumbs
     */
    protected function loadParent(ArticleInterface $article, array &$breadcrumbs)
    {
        if ($parent = $article->getParent()) {

            $breadcrumbs[$parent->getTitle()] = $parent->getPath();

            $this->loadParent($parent, $breadcrumbs);
        }
    }
}
