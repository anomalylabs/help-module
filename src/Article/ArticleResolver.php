<?php namespace Anomaly\HelpModule\Article;

use Anomaly\HelpModule\Article\Contract\ArticleRepositoryInterface;
use Illuminate\Routing\Route;

/**
 * Class ArticleResolver
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class ArticleResolver
{

    /**
     * The article repository.
     *
     * @var ArticleRepositoryInterface
     */
    protected $articles;

    /**
     * The active route.
     *
     * @var Route
     */
    protected $route;

    /**
     * Create a new ArticleResolver instance.
     *
     * @param ArticleRepositoryInterface $articles
     * @param Route                   $route
     */
    public function __construct(ArticleRepositoryInterface $articles, Route $route)
    {
        $this->articles = $articles;
        $this->route = $route;
    }

    /**
     * Resolve the article.
     *
     * @return Contract\ArticleInterface|null
     */
    public function resolve()
    {
        $action = $this->route->getAction();

        if ($id = array_get($action, 'anomaly.module.articles::article')) {
            return $this->articles->find($id);
        }

        if ($path = array_get($action, 'anomaly.module.articles::path')) {
            return $this->articles->findByPath($path);
        }

        return null;
    }
}
