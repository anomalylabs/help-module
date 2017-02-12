<?php namespace Anomaly\HelpModule\Category;

use Anomaly\HelpModule\Category\Contract\CategoryInterface;
use Anomaly\HelpModule\Section\SectionCollection;
use Anomaly\Streams\Platform\Model\Help\HelpCategoriesEntryModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class CategoryModel
 *
 * @link          http://pyrocms.com
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\HelpModule\Category
 */
class CategoryModel extends HelpCategoriesEntryModel implements CategoryInterface
{

    /**
     * Return the meta title.
     *
     * @return string
     */
    public function metaTitle()
    {
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
     * Get the related category.
     *
     * @return CategoryInterface
     */
    public function getCategory()
    {
        return $this->category;
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
     * Get the related sections.
     *
     * @return SectionCollection
     */
    public function getSections()
    {
        return $this->sections;
    }

    /**
     * Return the sections relation.
     *
     * @return HasMany
     */
    public function sections()
    {
        return $this->hasMany('Anomaly\HelpModule\Section\SectionModel', 'category_id');
    }
}
