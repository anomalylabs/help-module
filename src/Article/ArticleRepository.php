<?php namespace Anomaly\HelpModule\Article;

use Anomaly\HelpModule\Article\Contract\ArticleInterface;
use Anomaly\HelpModule\Article\Contract\ArticleRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class ArticleRepository
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class ArticleRepository extends EntryRepository implements ArticleRepositoryInterface
{

    use DispatchesJobs;

    /**
     * The article model.
     *
     * @var ArticleModel
     */
    protected $model;

    /**
     * Create a new ArticleRepositoryInterface instance.
     *
     * @param ArticleModel $model
     */
    public function __construct(ArticleModel $model)
    {
        $this->model = $model;
    }

    /**
     * Find a article by it's path.
     *
     * @param $path
     * @return null|ArticleInterface
     */
    public function findByPath($path)
    {
        return $this->model->where('path', $path)->first();
    }

    /**
     * Find a article by it's string ID.
     *
     * @param $id
     * @return null|ArticleInterface
     */
    public function findByStrId($id)
    {
        return $this->model->where('str_id', $id)->first();
    }
}
