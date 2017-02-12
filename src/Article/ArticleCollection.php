<?php namespace Anomaly\HelpModule\Article;

use Anomaly\HelpModule\Article\Contract\ArticleInterface;
use Anomaly\Streams\Platform\Entry\EntryCollection;

/**
 * Class ArticleCollection
 *
 * @article          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class ArticleCollection extends EntryCollection
{

    /**
     * Return only exact articles.
     *
     * @param  bool $exact
     * @return ArticleCollection
     */
    public function exact($exact = true)
    {
        $enabled = $this->enabled();

        return $enabled->filter(
            function ($article) use ($exact) {

                /* @var ArticleInterface $article */
                return $article->isExact() == $exact;
            }
        );
    }

    /**
     * Return only enabled articles.
     *
     * @return ArticleCollection
     */
    public function enabled($enabled = true)
    {
        return self::make(
            array_filter(
                $this->items,
                function ($article) use ($enabled) {

                    /* @var ArticleInterface $article */
                    return $article->isEnabled() == $enabled;
                }
            )
        );
    }

    /**
     * Return only visible articles.
     *
     * @param  bool $visible
     * @return ArticleCollection
     */
    public function visible($visible = true)
    {
        $enabled = $this->enabled();

        return $enabled->filter(
            function ($article) use ($visible) {

                /* @var ArticleInterface $article */
                return $article->isVisible() == $visible;
            }
        );
    }

    /**
     * Alias for $this->top()
     *
     * @return ArticleCollection
     */
    public function root()
    {
        return $this->top();
    }

    /**
     * Return only top level articles.
     *
     * @return ArticleCollection
     */
    public function top()
    {
        return $this->filter(
            function ($item) {

                /* @var ArticleInterface $item */
                return !$item->getParentId();
            }
        );
    }

    /**
     * Return only children of the provided item.
     *
     * @param $parent
     * @return ArticleCollection
     */
    public function children($parent)
    {
        /* @var ArticleInterface $parent */
        return $this->filter(
            function ($item) use ($parent) {

                /* @var ArticleInterface $item */
                return $item->getParentId() == $parent->getId();
            }
        );
    }

    /**
     * Return the current article.
     *
     * @return ArticleInterface|null
     */
    public function current()
    {
        /* @var ArticleInterface $item */
        foreach ($this->items as $item) {

            if ($item->isCurrent()) {
                return $item;
            }
        }

        return null;
    }

    /**
     * Return only active articles.
     *
     * @param  bool $active
     * @return ArticleCollection
     */
    public function active($active = true)
    {
        return $this->filter(
            function ($item) use ($active) {

                /* @var ArticleInterface $item */
                return $item->isActive() == $active;
            }
        );
    }
}
