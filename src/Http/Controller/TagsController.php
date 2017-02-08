<?php namespace Anomaly\HelpModule\Http\Controller;

use Anomaly\HelpModule\Tag\Command\AddTagBreadcrumb;
use Anomaly\HelpModule\Tag\Command\AddTagMetaTitle;
use Anomaly\Streams\Platform\Http\Controller\PublicController;

/**
 * Class TagsController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class TagsController extends PublicController
{

    /**
     * View tagged articles.
     *
     * @return \Illuminate\View\View
     */
    public function view($tag)
    {
        $this->breadcrumbs->add(
            'anomaly.module.help::breadcrumb.help',
            $this->url->route('anomaly.module.help::articles.index')
        );

        $this->dispatch(new AddTagBreadcrumb($tag));
        $this->dispatch(new AddTagMetaTitle($tag));

        return $this->view->make('anomaly.module.help::tags.view', compact('tag'));
    }
}
