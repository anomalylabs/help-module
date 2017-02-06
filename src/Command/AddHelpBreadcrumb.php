<?php namespace Anomaly\HelpModule\Command;

use Anomaly\Streams\Platform\Routing\UrlGenerator;
use Anomaly\Streams\Platform\Ui\Breadcrumb\BreadcrumbCollection;

/**
 * Class AddHelpBreadcrumb
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class AddHelpBreadcrumb
{

    /**
     * Handle the command.
     *
     * @param BreadcrumbCollection $breadcrumbs
     * @param UrlGenerator         $url
     */
    public function handle(BreadcrumbCollection $breadcrumbs, UrlGenerator $url)
    {
        $breadcrumbs->add(
            'anomaly.module.help::breadcrumb.help',
            $url->route('anomaly.module.help::articles.index')
        );
    }
}
