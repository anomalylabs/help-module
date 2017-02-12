<?php namespace Anomaly\HelpModule\Category\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;

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
}
