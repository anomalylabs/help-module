<?php namespace Anomaly\HelpModule\Type\Command;

use Anomaly\HelpModule\Article\Contract\ArticleRepositoryInterface;
use Anomaly\HelpModule\Type\Contract\TypeInterface;


/**
 * Class DeleteArticles
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class DeleteArticles
{

    /**
     * The article type instance.
     *
     * @var TypeInterface
     */
    protected $type;

    /**
     * Create a new DeleteArticles instance.
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
     * @param ArticleRepositoryInterface $articles
     */
    public function handle(ArticleRepositoryInterface $articles)
    {
        foreach ($this->type->getArticles() as $article) {
            $articles->delete($article);
        }
    }
}
