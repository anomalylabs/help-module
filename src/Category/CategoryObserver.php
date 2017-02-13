<?php namespace Anomaly\HelpModule\Category;

use Anomaly\HelpModule\Category\Command\UpdateCategorySections;
use Anomaly\HelpModule\Category\Contract\CategoryInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryObserver;

/**
 * Class CategoryObserver
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class CategoryObserver extends EntryObserver
{

    /**
     * Fired when a category is saved.
     *
     * @param EntryInterface|CategoryInterface $entry
     */
    public function saved(EntryInterface $entry)
    {
        if ($entry->isDirty('slug')) {
            $this->dispatch(new UpdateCategorySections($entry));
        }

        parent::saved($entry);
    }
}
