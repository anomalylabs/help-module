<?php namespace Anomaly\HelpModule\Category\Contract;

use Anomaly\HelpModule\Section\SectionCollection;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Interface CategoryInterface
 *
 * @link          http://pyrocms.com
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\HelpModule\Category\Contract
 */
interface CategoryInterface extends EntryInterface
{

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
     * Get the slug.
     *
     * @return string
     */
    public function getSlug();

    /**
     * Get the name.
     *
     * @return string
     */
    public function getName();

    /**
     * Get the related category.
     *
     * @return CategoryInterface
     */
    public function getCategory();

    /**
     * Get the description.
     *
     * @return string
     */
    public function getDescription();

    /**
     * Get the related sections.
     *
     * @return SectionCollection
     */
    public function getSections();

    /**
     * Return the sections relation.
     *
     * @return HasMany
     */
    public function sections();
}
