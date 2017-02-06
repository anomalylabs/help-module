<?php namespace Anomaly\HelpModule\Type\Command;

use Anomaly\HelpModule\Article\Contract\ArticleInterface;
use Anomaly\HelpModule\Article\Contract\ArticleRepositoryInterface;
use Anomaly\HelpModule\Type\Contract\TypeInterface;
use Anomaly\HelpModule\Type\Contract\TypeRepositoryInterface;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class UpdateArticles
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class UpdateArticles
{

    use DispatchesJobs;

    /**
     * The article type instance.
     *
     * @var TypeInterface
     */
    protected $type;

    /**
     * Update a new UpdateArticles instance.
     *
     * @param TypeInterface $type
     */
    public function __construct(TypeInterface $type)
    {
        $this->type = $type;
    }

    /**
     * Handle the command.
     *
     * @param TypeRepositoryInterface $types
     * @param ArticleRepositoryInterface $articles
     */
    public function handle(TypeRepositoryInterface $types, ArticleRepositoryInterface $articles)
    {
        /* @var TypeInterface $type */
        $type = $types->find($this->type->getId());

        /* @var ArticleInterface $article */
        foreach ($type->getArticles() as $article) {
            $articles->save($article->setAttribute('entry_type', $this->type->getEntryModelName()));
        }
    }
}
