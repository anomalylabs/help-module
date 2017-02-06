<?php namespace Anomaly\HelpModule\Article\Command;

use Anomaly\HelpModule\Article\Contract\ArticleInterface;
use Anomaly\HelpModule\Article\Contract\ArticleRepositoryInterface;
use Anomaly\Streams\Platform\Model\Contract\EloquentRepositoryInterface;


/**
 * Class DeleteEntry
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class DeleteEntry
{

    /**
     * The article instance.
     *
     * @var ArticleInterface
     */
    protected $article;

    /**
     * Create a new DeleteEntry instance.
     *
     * @param ArticleInterface $article
     */
    public function __construct(ArticleInterface $article)
    {
        $this->article = $article;
    }

    /**
     * Handle the command.
     *
     * @param ArticleRepositoryInterface $articles
     */
    public function handle(EloquentRepositoryInterface $repository)
    {
        if ($entry = $this->article->getEntry()) {
            $repository->delete($entry);
        }
    }
}
