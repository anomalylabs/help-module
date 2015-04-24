<?php namespace Anomaly\HelpModule\Section;

use Anomaly\HelpModule\Section\Contract\SectionRepositoryInterface;

/**
 * Class SectionRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\HelpModule\Section
 */
class SectionRepository implements SectionRepositoryInterface
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
}
