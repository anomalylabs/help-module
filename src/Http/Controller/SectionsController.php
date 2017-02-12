<?php namespace Anomaly\HelpModule\Http\Controller;

use Anomaly\HelpModule\Section\Contract\SectionInterface;
use Anomaly\HelpModule\Section\Contract\SectionRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\PublicController;

/**
 * Class SectionsController
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class SectionsController extends PublicController
{

    /**
     * View a single section.
     *
     * @param SectionRepositoryInterface $sections
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function view(SectionRepositoryInterface $sections)
    {
        /* @var SectionInterface $section */
        if (!$section = $sections->findBySlug($this->route->getParameter('slug'))) {
            abort(404);
        }

        $this->template->set('meta_title', $section->metaTitle());
        $this->template->set('meta_description', $section->metaDescription());

        $this->breadcrumbs->add(
            'anomaly.module.help::breadcrumb.help',
            $this->url->route('anomaly.module.help::articles.index')
        );

        $category = $section->getCategory();

        $this->breadcrumbs->add(
            $category->getName(),
            $category->route('view')
        );

        $this->breadcrumbs->add(
            $section->getName(),
            $section->route('view')
        );

        return $this->view->make('anomaly.module.help::sections.view', compact('section'));
    }
}
