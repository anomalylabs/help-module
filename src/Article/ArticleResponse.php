<?php namespace Anomaly\HelpModule\Article;

use Anomaly\HelpModule\Article\Contract\ArticleInterface;
use Illuminate\Routing\ResponseFactory;

/**
 * Class ArticleResponse
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class ArticleResponse
{

    /**
     * The response factory.
     *
     * @var ResponseFactory
     */
    protected $container;

    /**
     * Create a new ArticleResponse instance.
     *
     * @param ResponseFactory $response
     */
    function __construct(ResponseFactory $response)
    {
        $this->response = $response;
    }

    /**
     * Make the article response.
     *
     * @param ArticleInterface $article
     */
    public function make(ArticleInterface $article)
    {
        if (!$article->getResponse()) {
            $article->setResponse(
                $this->response->view('anomaly.module.help::articles/view', ['article' => $article, 'content' => $article->getContent()])
            );
        }
    }
}
