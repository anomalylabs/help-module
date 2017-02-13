<?php namespace Anomaly\HelpModule\Section;

use Anomaly\HelpModule\Section\Command\UpdateSectionArticles;
use Anomaly\HelpModule\Section\Contract\SectionInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryObserver;

/**
 * Class SectionObserver
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class SectionObserver extends EntryObserver
{

    /**
     * Fired when a section is saved.
     *
     * @param EntryInterface|SectionInterface $entry
     */
    public function saved(EntryInterface $entry)
    {
        if ($entry->isDirty('slug')) {
            $this->dispatch(new UpdateSectionArticles($entry));
        }

        parent::saved($entry);
    }
}
