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
     * Find a article by it's slug.
     *
     * @param $slug
     * @return null|ArticleInterface
     */
    public function findBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
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
