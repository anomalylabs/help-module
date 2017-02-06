<?php namespace Anomaly\HelpModule\Article\Handler\Contract;

use Anomaly\HelpModule\Article\Contract\ArticleInterface;

/**
 * Interface ArticleHandlerInterface
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
interface ArticleHandlerInterface
{

    /**
     * Make the article's response.
     *
     * @param ArticleInterface $article
     */
    public function make(ArticleInterface $article);

    /**
     * Route the article's response.
     *
     * @param ArticleInterface $article
     */
    public function route(ArticleInterface $article);
}
