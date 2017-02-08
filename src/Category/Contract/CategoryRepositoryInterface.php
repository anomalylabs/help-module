<?php namespace Anomaly\HelpModule\Category\Contract;

/**
 * Interface CategoryRepositoryInterface
 *
 * @link          http://pyrocms.com
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\HelpModule\Category\Contract
 */
interface CategoryRepositoryInterface
{

    /**
     * Find the category by it's slug.
     *
     * @param $slug
     * @return null|CategoryInterface
     */
    public function findBySlug($slug);
}
