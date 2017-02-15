<?php namespace Anomaly\HelpModule\Article;

use Anomaly\HelpModule\Article\Contract\ArticleInterface;
use Anomaly\HelpModule\Article\Handler\Contract\ArticleHandlerInterface;
use Anomaly\HelpModule\Category\Contract\CategoryInterface;
use Anomaly\HelpModule\Section\Contract\SectionInterface;
use Anomaly\HelpModule\Type\Contract\TypeInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Model\EloquentCollection;
use Anomaly\Streams\Platform\Model\Help\HelpArticlesEntryModel;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ArticleModel
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ArticleModel extends HelpArticlesEntryModel implements ArticleInterface
{

    /**
     * Always eager load these.
     *
     * @var array
     */
    protected $with = [
        'type',
        'entry',
        'translations',
    ];

    /**
     * The active flag.
     *
     * @var bool
     */
    protected $active = false;

    /**
     * The current flag.
     *
     * @var bool
     */
    protected $current = false;

    /**
     * The article's content.
     *
     * @var null|string
     */
    protected $content = null;

    /**
     * The article's response.
     *
     * @var null|Response
     */
    protected $response = null;

    /**
     * Return the article content.
     *
     * @return null|string
     */
    public function content()
    {
        return $this
            ->make()
            ->getContent();
    }

    /**
     * Get the content.
     *
     * @return null|string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the content.
     *
     * @param $content
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Make the article.
     *
     * @return $this
     */
    public function make()
    {
        $handler = $this->getHandler();

        $handler->make($this);

        return $this;
    }

    /**
     * Get the article handler.
     *
     * @return ArticleHandlerInterface
     */
    public function getHandler()
    {
        $type = $this->getType();

        return $type->getHandler();
    }

    /**
     * Get the article type.
     *
     * @return null|TypeInterface
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Return the meta title.
     *
     * @return string
     */
    public function metaTitle()
    {
        if (!$this->meta_title) {
            return $this->getTitle();
        }

        return $this->meta_title;
    }

    /**
     * Return the meta description.
     *
     * @return string
     */
    public function metaDescription()
    {
        return $this->meta_description;
    }

    /**
     * Get the path.
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Get the string ID.
     *
     * @return string
     */
    public function getStrId()
    {
        return $this->str_id;
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
     * Get the meta title.
     *
     * @return string
     */
    public function getMetaTitle()
    {
        return $this->meta_title;
    }

    /**
     * Get the meta description.
     *
     * @return string
     */
    public function getMetaDescription()
    {
        return $this->meta_description;
    }

    /**
     * Get the exact flag.
     *
     * @return bool
     */
    public function isExact()
    {
        return $this->exact;
    }

    /**
     * Get the enabled flag.
     *
     * @return bool
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * Get the visible flag.
     *
     * @return bool
     */
    public function isVisible()
    {
        return $this->getFieldValue('visible');
    }

    /**
     * Get the home flag.
     *
     * @return bool
     */
    public function isHome()
    {
        return $this->home;
    }

    /**
     * Get the related parent article.
     *
     * @return null|ArticleInterface
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Get the parent ID.
     *
     * @return int|null
     */
    public function getParentId()
    {
        return $this->parent_id;
    }

    /**
     * Get the related children articles.
     *
     * @return ArticleCollection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Get the related roles allowed.
     *
     * @return EloquentCollection
     */
    public function getAllowedRoles()
    {
        return $this->allowed_roles;
    }

    /**
     * Get the route suffix.
     *
     * @param  null $prefix
     * @return null|string
     */
    public function getRouteSuffix($prefix = null)
    {
        return $this->route_suffix ? $prefix . $this->route_suffix : null;
    }

    /**
     * Get the related category.
     *
     * @return null|CategoryInterface
     */
    public function getCategory()
    {
        $section = $this->getSection();

        return $section->getCategory();
    }

    /**
     * Get the related section.
     *
     * @return null|SectionInterface
     */
    public function getSection()
    {
        return $this->section;
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
     * Get the related entry ID.
     *
     * @return null|int
     */
    public function getEntryId()
    {
        return $this->entry_id;
    }

    /**
     * Get the response.
     *
     * @return Response|null
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Set the response.
     *
     * @param $response
     * @return $this
     */
    public function setResponse(Response $response)
    {
        $this->response = $response;

        return $this;
    }

    /**
     * Get the current flag.
     *
     * @return bool
     */
    public function isCurrent()
    {
        return $this->current;
    }

    /**
     * Set the current flag.
     *
     * @param $current
     * @return $this
     */
    public function setCurrent($current)
    {
        $this->current = $current;

        return $this;
    }

    /**
     * Get the active flag.
     *
     * @return bool
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * Set the active flag.
     *
     * @param $active
     * @return $this
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Return the children articles relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany('Anomaly\HelpModule\Article\ArticleModel', 'parent_id', 'id')
            ->orderBy('sort_order', 'ASC');
    }

    /**
     * Return the searchable array.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = parent::toSearchableArray();

        if ($entry = $this->getEntry()) {
            $array = array_merge($entry->toSearchableArray(), $array);
        }

        return $array;
    }

    /**
     * Get the related entry.
     *
     * @return null|EntryInterface
     */
    public function getEntry()
    {
        return $this->entry;
    }

    /**
     * Return whether the model is searchable or not.
     *
     * @return boolean
     */
    public function isSearchable()
    {
        return $this->isEnabled();
    }

    /**
     * Return the routable array.
     *
     * @return array
     */
    public function toRoutableArray()
    {
        $array = parent::toRoutableArray();

        $section  = $this->getSection();
        $category = $section->getCategory();

        $array['section']  = $section->getSlug();
        $array['category'] = $category->getSlug();

        return $array;
    }
}
