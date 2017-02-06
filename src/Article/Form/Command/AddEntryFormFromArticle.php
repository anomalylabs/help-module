<?php namespace Anomaly\HelpModule\Article\Form\Command;

use Anomaly\HelpModule\Entry\Form\EntryFormBuilder;
use Anomaly\HelpModule\Article\Contract\ArticleInterface;
use Anomaly\HelpModule\Article\Form\ArticleEntryFormBuilder;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class AddEntryFormFromArticle
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class AddEntryFormFromArticle
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
     * Create a new AddEntryFormFromArticle instance.
     *
     * @param ArticleEntryFormBuilder $builder
     * @param ArticleInterface        $article
     */
    public function __construct(ArticleEntryFormBuilder $builder, ArticleInterface $article)
    {
        $this->builder = $builder;
        $this->article    = $article;
    }

    /**
     * Handle the command.
     *
     * @param EntryFormBuilder $builder
     */
    public function handle(EntryFormBuilder $builder)
    {
        $type = $this->article->getType();

        $builder->setModel($type->getEntryModelName());
        $builder->setEntry($this->article->getEntryId());

        $this->builder->addForm('entry', $builder);
    }
}
