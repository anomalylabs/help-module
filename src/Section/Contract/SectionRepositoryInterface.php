<?php namespace Anomaly\HelpModule\Section\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryRepositoryInterface;

/**
 * Interface SectionRepositoryInterface
 *
 * @link          http://pyrocms.com
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\HelpModule\Section\Contract
 */
interface SectionRepositoryInterface extends EntryRepositoryInterface
{

    /**
     * Find a section by it's slug.
     *
     * @param $slug
     * @return null|SectionInterface
     */
    public function findBySlug($slug);
}
