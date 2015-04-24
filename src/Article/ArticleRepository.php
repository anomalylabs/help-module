<?php namespace Anomaly\HelpModule\Article;

use Anomaly\HelpModule\Article\Contract\ArticleRepositoryInterface;

/**
 * Class ArticleRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
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
