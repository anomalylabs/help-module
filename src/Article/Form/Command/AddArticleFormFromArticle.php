<?php namespace Anomaly\HelpModule\Article\Form\Command;

use Anomaly\HelpModule\Article\Contract\ArticleInterface;
use Anomaly\HelpModule\Article\Form\ArticleEntryFormBuilder;
use Anomaly\HelpModule\Article\Form\ArticleFormBuilder;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class AddArticleFormFromArticle
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class AddArticleFormFromArticle
{

    use DispatchesJobs;

    /**
     * The multiple form builder.
     *
     * @var ArticleEntryFormBuilder
     */
    protected $builder;

    /**
     * The article instance.
     *
     * @var ArticleInterface
     */
    protected $article;

    /**
     * Create a new AddArticleFormFromArticle instance.
     *
     * @param ArticleEntryFormBuilder $builder
     * @param ArticleInterface        $article
     */
    public function __construct(ArticleEntryFormBuilder $builder, ArticleInterface $article)
    {
        $this->builder = $builder;
        $this->article = $article;
    }

    /**
     * Handle the command.
     *
     * @param ArticleFormBuilder $builder
     */
    public function handle(ArticleFormBuilder $builder)
    {
        $builder->setEntry($this->article->getId());

        $this->builder->addForm('article', $builder);
    }
}
