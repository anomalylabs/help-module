<?php namespace Anomaly\HelpModule\Article\Command;

use Anomaly\HelpModule\Article\Contract\ArticleInterface;

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
     * @var ArticleInterface
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
        $section  = $this->article->getSection();
        $category = $this->article->getCategory();

        $this->article->setAttribute(
            'path',
            $category->getSlug() . '/' . $section->getSlug() . '/' . $this->article->getSlug()
        );
    }
}
