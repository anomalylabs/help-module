<?php namespace Anomaly\HelpModule\Article;

use Anomaly\HelpModule\Article\Contract\ArticleInterface;
use Anomaly\Streams\Platform\Routing\UrlGenerator;
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
     * The URL generator.
     *
     * @var UrlGenerator
     */
    protected $url;

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
     * @param UrlGenerator         $url
     * @param Request              $request
     * @param BreadcrumbCollection $breadcrumbs
     */
    public function __construct(UrlGenerator $url, Request $request, BreadcrumbCollection $breadcrumbs)
    {
        $this->url         = $url;
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

        $section = $article->getSection();

        $breadcrumbs[$section->getName()] = $section->route('view');

        $category = $section->getCategory();

        $breadcrumbs[$category->getName()] = $category->route('view');

        $this->breadcrumbs->add(
            'anomaly.module.help::breadcrumb.help',
            $this->url->route('anomaly.module.help::articles.index')
        );

        foreach (array_reverse($breadcrumbs) as $key => $url) {
            $this->breadcrumbs->add($key, $url);
        }
    }
}
