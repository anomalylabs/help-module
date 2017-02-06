<?php namespace Anomaly\HelpModule\Article\Command;

use Anomaly\HelpModule\Article\Contract\ArticleInterface;

/**
 * Class SetStrId
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class SetStrId
{

    /**
     * The article instance.
     *
     * @var ArticleInterface
     */
    protected $article;

    /**
     * Create a new SetStrId instance.
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
        if (!$this->article->getStrId()) {
            $this->article->str_id = str_random(24);
        }
    }
}
