<?php namespace Anomaly\HelpModule\Http\Controller\Admin;

use Anomaly\HelpModule\Section\Form\SectionFormBuilder;
use Anomaly\HelpModule\Section\Table\SectionTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class SectionsController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\HelpModule\Http\Controller\Admin
 */
class SectionsController extends AdminController
{

    /**
     * Return an index of existing sections.
     *
     * @param SectionTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(SectionTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Return a form for a new section.
     *
     * @param SectionFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(SectionFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Return a form for an existing section.
     *
     * @param SectionFormBuilder $form
     * @param                    $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(SectionFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
