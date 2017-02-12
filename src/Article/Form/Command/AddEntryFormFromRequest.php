<?php namespace Anomaly\HelpModule\Article\Form\Command;

use Anomaly\HelpModule\Article\Form\ArticleEntryFormBuilder;
use Anomaly\HelpModule\Entry\Form\EntryFormBuilder;
use Anomaly\HelpModule\Type\Contract\TypeRepositoryInterface;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;

/**
 * Class AddEntryFormFromRequest
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class AddEntryFormFromRequest
{

    use DispatchesJobs;

    /**
     * The multiple form builder.
     *
     * @var ArticleEntryFormBuilder
     */
    protected $builder;

    /**
     * Create a new AddEntryFormFromRequest instance.
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
     * @param EntryFormBuilder        $builder
     * @param Request                 $request
     */
    public function handle(TypeRepositoryInterface $types, EntryFormBuilder $builder, Request $request)
    {
        $type = $types->find($request->get('type'));

        $this->builder->addForm('entry', $builder->setModel($type->getEntryModelName()));
    }
}
