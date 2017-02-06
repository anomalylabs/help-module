<?php namespace Anomaly\HelpModule\Article\Command;

use Anomaly\Streams\Platform\View\ViewTemplate;
use Illuminate\Translation\Translator;

/**
 * Class AddArticlesMetaTitle
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class AddArticlesMetaTitle
{

    /**
     * Set the meta title.
     *
     * @param ViewTemplate $template
     * @param Translator   $translator
     */
    public function handle(ViewTemplate $template, Translator $translator)
    {
        $template->set('meta_title', $translator->trans('anomaly.module.help::breadcrumb.articles'));
    }
}
