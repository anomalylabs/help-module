<?php namespace Anomaly\HelpModule\Article\Command;

use Anomaly\HelpModule\Article\ArticleModel;
use Anomaly\HelpModule\Article\Contract\ArticleInterface;
use Anomaly\HelpModule\Section\Contract\SectionInterface;

/**
 * Class SetPath
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class SetPath
{

    /**
     * The article instance.
     *
     * @var ArticleInterface|ArticleModel
     */
    protected $article;

    /**
     * Create a new SetPath instance.
     *
     * @param ArticleInterface $article
     */
    public function __construct(ArticleInterface $article)
    {
        $this->article = $article;
    }

    /**
     * Handle the command.
     */
    public function handle()
    {
        /* @var SectionInterface $section */
        $section  = $this->article->getSection();
        $category = $section->getCategory();

        $this->article->setAttribute(
            'path',
            $category->getSlug() . '/' . $section->getSlug() . '/' . $this->article->getSlug()
        );
    }
}
