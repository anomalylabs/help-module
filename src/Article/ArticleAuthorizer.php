<?php namespace Anomaly\HelpModule\Article;

use Anomaly\HelpModule\Article\Contract\ArticleInterface;
use Anomaly\Streams\Platform\Support\Authorizer;
use Anomaly\UsersModule\Role\RoleCollection;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Routing\ResponseFactory;

/**
 * Class ArticleAuthorizer
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ArticleAuthorizer
{

    /**
     * The authorization utility.
     *
     * @var Guard
     */
    protected $guard;

    /**
     * The config repository.
     *
     * @var Repository
     */
    protected $config;

    /**
     * The response factory.
     *
     * @var ResponseFactory
     */
    protected $response;

    /**
     * The authorizer utility.
     *
     * @var Authorizer
     */
    protected $authorizer;

    /**
     * Create a new ArticleAuthorizer instance.
     *
     * @param Guard $guard
     * @param Repository $config
     * @param Authorizer $authorizer
     * @param ResponseFactory $response
     */
    public function __construct(Guard $guard, Repository $config, Authorizer $authorizer, ResponseFactory $response)
    {
        $this->guard      = $guard;
        $this->config     = $config;
        $this->response   = $response;
        $this->authorizer = $authorizer;
    }

    /**
     * Authorize the article.
     *
     * @param ArticleInterface $article
     */
    public function authorize(ArticleInterface $article)
    {
        /* @var UserInterface $user */
        //$user = $this->guard->user();

        /* @var RoleCollection $allowed */
        //$allowed = $article->getAllowedRoles();

        /*
         * If the article is not enabled yet check and make
         * sure that we are allowed to preview it first.
         */
        if (!$article->isEnabled() && !$this->authorizer->authorize('anomaly.module.help::articles.preview')) {
            abort(403);
        }

        /*
         * Check the roles against the
         * user if there are any.
         */
//        if (
//            $article->isEnabled()
//            && !$allowed->isEmpty()
//            && (!$user || (!$user->hasAnyRole($allowed) && !$user->isAdmin()))
//        ) {
//            $article->setResponse($this->response->redirectGuest('login'));
//        }
    }
}
