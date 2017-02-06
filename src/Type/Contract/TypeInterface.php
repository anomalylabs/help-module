<?php namespace Anomaly\HelpModule\Type\Contract;

use Anomaly\HelpModule\Article\ArticleCollection;
use Anomaly\HelpModule\Article\Handler\Contract\ArticleHandlerInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryModel;
use Anomaly\Streams\Platform\Stream\Contract\StreamInterface;

/**
 * Interface TypeInterface
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
interface TypeInterface extends EntryInterface
{

    /**
     * Get the name.
     *
     * @return string
     */
    public function getName();

    /**
     * Get the slug.
     *
     * @return string
     */
    public function getSlug();

    /**
     * Get the description.
     *
     * @return string
     */
    public function getDescription();

    /**
     * Get the related entry stream.
     *
     * @return StreamInterface
     */
    public function getEntryStream();

    /**
     * Get the related entry stream ID.
     *
     * @return null|int
     */
    public function getEntryStreamId();

    /**
     * Get the related entry model.
     *
     * @return EntryModel
     */
    public function getEntryModel();

    /**
     * Get the related entry model name.
     *
     * @return string
     */
    public function getEntryModelName();

    /**
     * Get the article handler.
     *
     * @return ArticleHandlerInterface
     */
    public function getHandler();

    /**
     * Get the theme layout.
     *
     * @return string
     */
    public function getThemeLayout();

    /**
     * Get the related articles.
     *
     * @return ArticleCollection
     */
    public function getArticles();

    /**
     * Return the articles relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles();
}
