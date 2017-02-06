<?php namespace Anomaly\HelpModule\Type\Command;

use Anomaly\DocumentationModule\Article\Contract\ArticleRepositoryInterface;
use Anomaly\DocumentationModule\Type\Contract\TypeInterface;


/**
 * Class RestoreArticles
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class RestoreArticles
{

    /**
     * The article type instance.
     *
     * @var TypeInterface
     */
    protected $type;

    /**
     * Create a new RestoreArticles instance.
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
        foreach ($this->type->articles()->onlyTrashed()->get() as $article) {
            $articles->restore($article);
        }
    }
}
