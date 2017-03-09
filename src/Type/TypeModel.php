<?php namespace Anomaly\HelpModule\Type;

use Anomaly\HelpModule\Article\ArticleCollection;
use Anomaly\HelpModule\Article\Handler\Contract\ArticleHandlerInterface;
use Anomaly\HelpModule\Type\Command\GetStream;
use Anomaly\HelpModule\Type\Contract\TypeInterface;
use Anomaly\Streams\Platform\Entry\EntryModel;
use Anomaly\Streams\Platform\Model\Help\HelpTypesEntryModel;
use Anomaly\Streams\Platform\Stream\Contract\StreamInterface;

/**
 * Class TypeModel
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class TypeModel extends HelpTypesEntryModel implements TypeInterface
{

    /**
     * Always eager load these.
     *
     * @var array
     */
    protected $with = [
        'translations',
    ];

    /**
     * The cascaded relations.
     *
     * @var array
     */
    protected $cascades = [
        'articles',
    ];

    /**
     * Get the name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the slug.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Get the description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the related entry stream ID.
     *
     * @return null|int
     */
    public function getEntryStreamId()
    {
        if (!$stream = $this->getEntryStream()) {
            return null;
        }

        return $stream->getId();
    }

    /**
     * Get the related entry stream.
     *
     * @return StreamInterface
     */
    public function getEntryStream()
    {
        return $this->dispatch(new GetStream($this));
    }

    /**
     * Get the related entry model.
     *
     * @return EntryModel
     */
    public function getEntryModel()
    {
        $stream = $this->getEntryStream();

        return $stream->getEntryModel();
    }

    /**
     * Get the related entry model name.
     *
     * @return string
     */
    public function getEntryModelName()
    {
        $stream = $this->getEntryStream();

        return $stream->getEntryModelName();
    }

    /**
     * Get the article handler.
     *
     * @return ArticleHandlerInterface
     */
    public function getHandler()
    {
        return $this->handler;
    }

    /**
     * Get the theme layout.
     *
     * @return string
     */
    public function getThemeLayout()
    {
        return $this->theme_layout;
    }

    /**
     * Get the related articles.
     *
     * @return ArticleCollection
     */
    public function getArticles()
    {
        return $this->articles;
    }

    /**
     * Return the articles relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles()
    {
        return $this->hasMany('Anomaly\HelpModule\Article\ArticleModel', 'type_id');
    }
}
