<?php namespace Anomaly\HelpModule\Category\Command;

use Anomaly\HelpModule\Category\Contract\CategoryInterface;
use Anomaly\HelpModule\Section\Command\UpdateSectionArticles;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class UpdateCategorySections
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class UpdateCategorySections
{

    use DispatchesJobs;

    /**
     * The category instance.
     *
     * @var CategoryInterface
     */
    protected $category;

    /**
     * Create a new UpdateCategorySections instance.
     *
     * @param CategoryInterface $category
     */
    public function __construct(CategoryInterface $category)
    {
        $this->category = $category;
    }

    /**
     * Handle the command.
     */
    public function handle()
    {
        foreach ($this->category->getSections() as $section) {
            $this->dispatch(new UpdateSectionArticles($section));
        }
    }
}
