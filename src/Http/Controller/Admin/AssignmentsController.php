<?php namespace Anomaly\HelpModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Assignment\Form\AssignmentFormBuilder;
use Anomaly\Streams\Platform\Assignment\Table\AssignmentTableBuilder;
use Anomaly\Streams\Platform\Field\Contract\FieldInterface;
use Anomaly\Streams\Platform\Field\Contract\FieldRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\Streams\Platform\Stream\Contract\StreamInterface;
use Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface;

/**
 * Class AssignmentsController
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class AssignmentsController extends AdminController
{

    /**
     * Return an index of existing assignments.
     *
     * @param AssignmentTableBuilder    $table
     * @param StreamRepositoryInterface $streams
     * @param                           $stream
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(AssignmentTableBuilder $table, StreamRepositoryInterface $streams, $stream)
    {
        /* @var StreamInterface $stream */
        $stream = $streams->find($stream);

        return $table->setStream($stream)->render();
    }

    /**
     * Return the modal for choosing a field to assign.
     *
     * @param FieldRepositoryInterface  $fields
     * @param StreamRepositoryInterface $streams
     * @return \Illuminate\Contracts\View\View
     */
    public function choose(FieldRepositoryInterface $fields, StreamRepositoryInterface $streams)
    {
        /* @var StreamInterface $stream */
        $stream = $streams->find($this->route->getParameter('stream'));

        $fields = $fields
            ->findAllByNamespace('help')
            ->notAssignedTo($stream)
            ->unlocked();

        return $this->view->make('anomaly.module.help::admin/assignments/choose', compact('fields', 'type'));
    }

    /**
     * Create a new assignment.
     *
     * @param AssignmentFormBuilder     $builder
     * @param StreamRepositoryInterface $streams
     * @param FieldRepositoryInterface  $fields
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(
        AssignmentFormBuilder $builder,
        StreamRepositoryInterface $streams,
        FieldRepositoryInterface $fields
    ) {
        /* @var FieldInterface $field */
        /* @var StreamInterface $stream */
        $field  = $fields->find($this->request->get('field'));
        $stream = $streams->find($this->route->getParameter('stream'));

        return $builder
            ->setField($field)
            ->setStream($stream)
            ->render();
    }

    /**
     * Edit an existing assignment.
     *
     * @param AssignmentFormBuilder     $builder
     * @param StreamRepositoryInterface $streams
     * @param                           $stream
     * @param                           $assignment
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(AssignmentFormBuilder $builder, StreamRepositoryInterface $streams, $stream, $assignment)
    {
        /* @var StreamInterface $stream */
        $stream = $streams->find($stream);

        return $builder
            ->setStream($stream)
            ->render($assignment);
    }
}
