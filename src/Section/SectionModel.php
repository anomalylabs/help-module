<?php namespace Anomaly\HelpModule\Section;

use Anomaly\HelpModule\Article\ArticleCollection;
use Anomaly\HelpModule\Article\ArticleModel;
use Anomaly\HelpModule\Category\Contract\CategoryInterface;
use Anomaly\HelpModule\Section\Contract\SectionInterface;
use Anomaly\Streams\Platform\Model\Help\HelpSectionsEntryModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class SectionModel
 *
 * @link          http://pyrocms.com
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\HelpModule\Section
 */
class SectionModel extends HelpSectionsEntryModel implements SectionInterface
{

    /**
     * Return the meta title.
     *
     * @return string
     */
    public function metaTitle()
    {
        if (!$this->meta_title) {
            return $this->getName();
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
        if (!$this->meta_description) {
            return $this->getDescription();
        }

        return $this->meta_description;
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
     * Get the name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
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
     * Get the related articles.
     *
     * @return ArticleCollection
     */
    public function getArticles()
    {
        return $this->articles;
    }

    /**
     * Return the articles relation.
     *
     * @return HasMany
     */
    public function articles()
    {
        return $this->hasMany(ArticleModel::class, 'section_id');
    }

    /**
     * Return the routable array.
     *
     * @return array
     */
    public function toRoutableArray()
    {
        $array = parent::toRoutableArray();

        $category = $this->getCategory();

        $array['category'] = $category->getSlug();

        return $array;
    }

    /**
     * Get the category.
     *
     * @return CategoryInterface
     */
    public function getCategory()
    {
        return $this->category;
    }
}
