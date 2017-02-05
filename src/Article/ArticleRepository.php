<?php namespace Anomaly\HelpModule\Article;

use Anomaly\HelpModule\Article\Contract\ArticleRepositoryInterface;

/**
 * Class ArticleRepository
 *
 * @link          http://pyrocms.com
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\HelpModule\Article
 */
class ArticleRepository implements ArticleRepositoryInterface
{

    /**
     * The article model.
     *
     * @var ArticleModel
     */
    protected $model;

    /**
     * Create a new ArticleRepository instance.
     *
     * @param ArticleModel $model
     */
    public function __construct(ArticleModel $model)
    {
        $this->model = $model;
    }
}
