<?php namespace Anomaly\HelpModule\Category\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryRepositoryInterface;

/**
 * Interface CategoryRepositoryInterface
 *
 * @link          http://pyrocms.com
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\HelpModule\Category\Contract
 */
interface CategoryRepositoryInterface extends EntryRepositoryInterface
{

    /**
     * Find the category by it's slug.
     *
     * @param $slug
     * @return null|CategoryInterface
     */
    public function findBySlug($slug);
}
