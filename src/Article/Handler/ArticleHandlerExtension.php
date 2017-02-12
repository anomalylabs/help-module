<?php namespace Anomaly\HelpModule\Article\Handler;

use Anomaly\HelpModule\Article\Contract\ArticleInterface;
use Anomaly\HelpModule\Article\Handler\Contract\ArticleHandlerInterface;
use Anomaly\Streams\Platform\Addon\Extension\Extension;

/**
 * Class ArticleHandlerExtension
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class ArticleHandlerExtension extends Extension implements ArticleHandlerInterface
{

    /**
     * Make the article's response.
     *
     * @param ArticleInterface $article
     */
    public function make(ArticleInterface $article)
    {
        throw new \Exception('Implement make() method.');
    }

    /**
     * Route the article's response.
     *
     * @param ArticleInterface $article
     */
    public function route(ArticleInterface $article)
    {

        if (!$article->isExact()) {

            \Route::any(
                $article->getPath() . '/{any?}',
                [
                    'uses'                         => 'Anomaly\HelpModule\Http\Controller\ArticlesController@view',
                    'streams::addon'               => 'anomaly.module.help',
                    'anomaly.module.help::article' => $article->getId(),
                    'where'                        => [
                        'any' => '(.*)',
                    ],
                ]
            );

            return;
        }

        \Route::any(
            $article->getPath(),
            [
                'uses'                         => 'Anomaly\HelpModule\Http\Controller\ArticlesController@view',
                'streams::addon'               => 'anomaly.module.help',
                'anomaly.module.help::article' => $article->getId(),
            ]
        );
    }
}
