<?php namespace Anomaly\HelpModule\Section\Contract;

/**
 * Interface SectionRepositoryInterface
 *
 * @link          http://pyrocms.com
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\HelpModule\Section\Contract
 */
interface SectionRepositoryInterface
{

    /**
     * Find a section by it's slug.
     *
     * @param $slug
     * @return null|SectionInterface
     */
    public function findBySlug($slug);
}
