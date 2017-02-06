<?php namespace Anomaly\HelpModule\Article;

use Anomaly\EditorFieldType\EditorFieldType;
use Anomaly\EditorFieldType\EditorFieldTypePresenter;
use Anomaly\HelpModule\Article\Contract\ArticleInterface;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\View\Factory;
use Robbo\Presenter\Decorator;

/**
 * Class ArticleContent
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ArticleContent
{

    /**
     * The view factory.
     *
     * @var Factory
     */
    protected $view;

    /**
     * The decorator utility.
     *
     * @var Decorator
     */
    protected $decorator;

    /**
     * The response factory.
     *
     * @var ResponseFactory
     */
    protected $response;

    /**
     * Create a new ArticleContent instance.
     *
     * @param Factory         $view
     * @param Decorator       $decorator
     * @param ResponseFactory $response
     */
    public function __construct(Factory $view, Decorator $decorator, ResponseFactory $response)
    {
        $this->view      = $view;
        $this->decorator = $decorator;
        $this->response  = $response;
    }

    /**
     * Make the view content.
     *
     * @param ArticleInterface $article
     */
    public function make(ArticleInterface $article)
    {
        $type = $article->getType();

        /* @var EditorFieldType $layout */
        /* @var EditorFieldTypePresenter $presenter */
        $layout    = $type->getFieldType('layout');
        $presenter = $type->getFieldTypePresenter('layout');

        $article->setContent($this->view->make($layout->getViewPath(), compact('article'))->render());

        /**
         * If the type layout is taking the
         * reigns then allow it to do so.
         *
         * This will let layouts natively
         * extend parent view blocks.
         */
        if (strpos($presenter->content(), '{% extends') !== false) {
            $article->setResponse($this->response->make($article->getContent()));
        }
    }
}
