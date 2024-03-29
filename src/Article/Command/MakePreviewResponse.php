<?php namespace Anomaly\HelpModule\Article\Command;

use Anomaly\HelpModule\Article\ArticleContent;
use Anomaly\HelpModule\Article\ArticleLoader;
use Anomaly\HelpModule\Article\ArticleResponse;
use Anomaly\HelpModule\Article\Contract\ArticleInterface;


/**
 * Class MakePreviewResponse
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class MakePreviewResponse
{

    /**
     * The article instance.
     *
     * @var ArticleInterface
     */
    private $article;

    /**
     * Create a new MakePreviewResponse instance.
     *
     * @param ArticleInterface $article
     */
    public function __construct(ArticleInterface $article)
    {
        $this->article = $article;
    }

    /**
     * Handle the command
     *
     * @param ArticleLoader   $loader
     * @param ArticleContent  $content
     * @param ArticleResponse $response
     */
    public function handle(
        ArticleLoader $loader,
        ArticleContent $content,
        ArticleResponse $response
    ) {
        $loader->load($this->article);
        $content->make($this->article);
        $response->make($this->article);
    }
}
