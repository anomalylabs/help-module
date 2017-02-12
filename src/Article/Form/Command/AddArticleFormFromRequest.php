<?php namespace Anomaly\HelpModule\Article\Form\Command;

use Anomaly\HelpModule\Article\Form\ArticleEntryFormBuilder;
use Anomaly\HelpModule\Article\Form\ArticleFormBuilder;
use Anomaly\HelpModule\Type\Contract\TypeRepositoryInterface;
use Illuminate\Http\Request;

/**
 * Class AddArticleFormFromRequest
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class AddArticleFormFromRequest
{

    /**
     * The multiple form builder.
     *
     * @var ArticleEntryFormBuilder
     */
    protected $builder;

    /**
     * Create a new AddArticleFormFromRequest instance.
     *
     * @param ArticleEntryFormBuilder $builder
     */
    public function __construct(ArticleEntryFormBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * Handle the command.
     *
     * @param TypeRepositoryInterface $types
     * @param ArticleFormBuilder      $builder
     * @param Request                 $request
     */
    public function handle(TypeRepositoryInterface $types, ArticleFormBuilder $builder, Request $request)
    {
        $this->builder->addForm('article', $builder->setType($types->find($request->get('type'))));
    }
}
