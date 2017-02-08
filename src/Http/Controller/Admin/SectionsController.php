<?php namespace Anomaly\HelpModule\Http\Controller\Admin;

use Anomaly\HelpModule\Section\Contract\SectionInterface;
use Anomaly\HelpModule\Section\Contract\SectionRepositoryInterface;
use Anomaly\HelpModule\Section\Form\SectionFormBuilder;
use Anomaly\HelpModule\Section\Table\SectionTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class SectionsController
 *
 * @link          http://pyrocms.com
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
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

    /**
     * Redirect to a article's URL.
     *
     * @param  SectionRepositoryInterface $sections
     * @return \Illuminate\Http\RedirectResponse
     */
    public function view(SectionRepositoryInterface $sections)
    {
        /* @var SectionInterface $section */
        $section = $sections->find($this->route->parameter('id'));

        return $this->redirect->to($section->route('view'));
    }
}
