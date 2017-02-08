<?php namespace Anomaly\HelpModule\Section;

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
     * Get the name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
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
     * @return SectionCollection
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
        return $this->hasMany('Anomaly\HelpModule\Article\ArticleModel', 'section_id');
    }
}
