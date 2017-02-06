<?php namespace Anomaly\HelpModule\Article;

use Anomaly\HelpModule\Article\Command\DeleteEntry;
use Anomaly\HelpModule\Article\Contract\ArticleInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryModel;
use Anomaly\Streams\Platform\Entry\EntryObserver;
use Anomaly\HelpModule\Article\Command\SetStrId;

/**
 * Class ArticleObserver
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class ArticleObserver extends EntryObserver
{

    /**
     * Fired before saving the article.
     *
     * @param EntryInterface|ArticleInterface|EntryModel $entry
     */
    public function saving(EntryInterface $entry)
    {
        $this->dispatch(new SetStrid($entry));

        parent::saving($entry);
    }

    /**
     * /**
     * Fired after a article is deleted.
     *
     * @param EntryInterface|ArticleInterface $entry
     */
    public function deleted(EntryInterface $entry)
    {
        $this->dispatch(new DeleteEntry($entry));

        parent::deleted($entry);
    }
}
