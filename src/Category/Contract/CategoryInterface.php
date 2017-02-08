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
