<?php namespace Anomaly\HelpModule\Article\Contract;

use Anomaly\HelpModule\Article\ArticleCollection;
use Anomaly\HelpModule\Article\Handler\Contract\ArticleHandlerInterface;
use Anomaly\HelpModule\Category\Contract\CategoryInterface;
use Anomaly\HelpModule\Section\Contract\SectionInterface;
use Anomaly\HelpModule\Type\Contract\TypeInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Model\EloquentCollection;
use Symfony\Component\HttpFoundation\Response;

/**
 * Interface ArticleInterface
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
interface ArticleInterface extends EntryInterface
{

    /**
     * Make the article.
     *
     * @return $this
     */
    public function make();

    /**
     * Return the article content.
     *
     * @return null|string
     */
    public function content();

    /**
     * Return the meta title.
     *
     * @return string
     */
    public function metaTitle();

    /**
     * Return the meta description.
     *
     * @return string
     */
    public function metaDescription();

    /**
     * Get the path.
     *
     * @return string
     */
    public function getPath();

    /**
     * Get the string ID.
     *
     * @return string
     */
    public function getStrId();

    /**
     * Get the slug.
     *
     * @return string
     */
    public function getSlug();

    /**
     * Get the title.
     *
     * @return string
     */
    public function getTitle();

    /**
     * Get the current flag.
     *
     * @return bool
     */
    public function isCurrent();

    /**
     * Set the current flag.
     *
     * @param $current
     * @return $this
     */
    public function setCurrent($current);

    /**
     * Get the active flag.
     *
     * @return bool
     */
    public function isActive();

    /**
     * Set the active flag.
     *
     * @param $active
     * @return $this
     */
    public function setActive($active);

    /**
     * Get the meta title.
     *
     * @return string
     */
    public function getMetaTitle();

    /**
     * Get the meta description.
     *
     * @return string
     */
    public function getMetaDescription();

    /**
     * Get the exact flag.
     *
     * @return bool
     */
    public function isExact();

    /**
     * Get the enabled flag.
     *
     * @return bool
     */
    public function isEnabled();

    /**
     * Get the visible flag.
     *
     * @return bool
     */
    public function isVisible();

    /**
     * Get the home flag.
     *
     * @return bool
     */
    public function isHome();

    /**
     * Get the related parent article.
     *
     * @return null|ArticleInterface
     */
    public function getParent();

    /**
     * Get the parent ID.
     *
     * @return null|int
     */
    public function getParentId();

    /**
     * Get the related children articles.
     *
     * @return ArticleCollection
     */
    public function getChildren();

    /**
     * Get the related roles allowed.
     *
     * @return EloquentCollection
     */
    public function getAllowedRoles();

    /**
     * Get the related article type.
     *
     * @return null|TypeInterface
     */
    public function getType();

    /**
     * Get the related section.
     *
     * @return SectionInterface
     */
    public function getSection();

    /**
     * Get the related category.
     *
     * @return CategoryInterface
     */
    public function getCategory();

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
     * Get the related entry.
     *
     * @return null|EntryInterface
     */
    public function getEntry();

    /**
     * Get the related entry ID.
     *
     * @return null|int
     */
    public function getEntryId();

    /**
     * Get the content.
     *
     * @return null|string
     */
    public function getContent();

    /**
     * Set the content.
     *
     * @param $content
     * @return $this
     */
    public function setContent($content);

    /**
     * Get the response.
     *
     * @return Response|null
     */
    public function getResponse();

    /**
     * Set the response.
     *
     * @param $response
     * @return $this
     */
    public function setResponse(Response $response);
}
