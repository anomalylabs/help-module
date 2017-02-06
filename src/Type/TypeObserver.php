<?php namespace Anomaly\HelpModule\Type;

use Anomaly\HelpModule\Type\Command\CreateStream;
use Anomaly\HelpModule\Type\Command\DeleteArticles;
use Anomaly\HelpModule\Type\Command\DeleteStream;
use Anomaly\HelpModule\Type\Command\RestoreArticles;
use Anomaly\HelpModule\Type\Command\UpdateArticles;
use Anomaly\HelpModule\Type\Command\UpdateStream;
use Anomaly\HelpModule\Type\Contract\TypeInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryObserver;

/**
 * Class TypeObserver
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class TypeObserver extends EntryObserver
{

    /**
     * Fired after a article type is created.
     *
     * @param EntryInterface|TypeInterface $entry
     */
    public function created(EntryInterface $entry)
    {
        $this->commands->dispatch(new CreateStream($entry));

        parent::created($entry);
    }

    /**
     * Fired before a article type is updated.
     *
     * @param EntryInterface|TypeInterface $entry
     */
    public function updating(EntryInterface $entry)
    {
        $this->commands->dispatch(new UpdateStream($entry));
        $this->commands->dispatch(new UpdateArticles($entry));

        parent::updating($entry);
    }

    /**
     * Fired after a article type is deleted.
     *
     * @param EntryInterface|TypeInterface $entry
     */
    public function deleted(EntryInterface $entry)
    {
        $this->commands->dispatch(new DeleteArticles($entry));
        $this->commands->dispatch(new DeleteStream($entry));

        parent::deleted($entry);
    }

    /**
     * Fired after a article type is restored.
     *
     * @param EntryInterface|TypeInterface $entry
     */
    public function restored(EntryInterface $entry)
    {
        $this->commands->dispatch(new RestoreArticles($entry));

        parent::restored($entry);
    }
}
