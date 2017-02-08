<?php namespace Anomaly\HelpModule\Section\Contract;

use Anomaly\HelpModule\Category\Contract\CategoryInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;

/**
 * Interface SectionInterface
 *
 * @link          http://pyrocms.com
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\HelpModule\Section\Contract
 */
interface SectionInterface extends EntryInterface
{

    /**
     * Get the name.
     *
     * @return string
     */
    public function getName();

    /**
     * Get the category.
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
