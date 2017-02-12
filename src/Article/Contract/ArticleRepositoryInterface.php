<?php namespace Anomaly\HelpModule\Article\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryRepositoryInterface;

/**
 * Interface ArticleRepositoryInterface
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
interface ArticleRepositoryInterface extends EntryRepositoryInterface
{

    /**
     * Find a article by it's path.
     *
     * @param $path
     * @return null|ArticleInterface
     */
    public function findByPath($path);

    /**
     * Find a article by it's string ID.
     *
     * @param $id
     * @return null|ArticleInterface
     */
    public function findByStrId($id);
}
