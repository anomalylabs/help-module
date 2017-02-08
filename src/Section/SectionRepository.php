<?php namespace Anomaly\HelpModule\Section;

use Anomaly\HelpModule\Section\Contract\SectionInterface;
use Anomaly\HelpModule\Section\Contract\SectionRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

/**
 * Class SectionRepository
 *
 * @link          http://pyrocms.com
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\HelpModule\Section
 */
class SectionRepository extends EntryRepository implements SectionRepositoryInterface
{

    /**
     * The section model.
     *
     * @var SectionModel
     */
    protected $model;

    /**
     * Create a new SectionRepository instance.
     *
     * @param SectionModel $model
     */
    public function __construct(SectionModel $model)
    {
        $this->model = $model;
    }

    /**
     * Find a section by it's slug.
     *
     * @param $slug
     * @return null|SectionInterface
     */
    public function findBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }
}
