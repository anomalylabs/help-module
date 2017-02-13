<?php namespace Anomaly\HelpModule\Section\Command;

use Anomaly\HelpModule\Article\Command\SetPath;
use Anomaly\HelpModule\Article\Contract\ArticleInterface;
use Anomaly\HelpModule\Article\Contract\ArticleRepositoryInterface;
use Anomaly\HelpModule\Section\Contract\SectionInterface;
use Anomaly\Streams\Platform\Model\EloquentModel;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class UpdateSectionArticles
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class UpdateSectionArticles
{

    use DispatchesJobs;

    /**
     * The section instance.
     *
     * @var SectionInterface
     */
    protected $section;

    /**
     * Create a new UpdateSectionArticles instance.
     *
     * @param SectionInterface $section
     */
    public function __construct(SectionInterface $section)
    {
        $this->section = $section;
    }

    /**
     * Handle the command.
     *
     * @param ArticleRepositoryInterface $articles
     */
    public function handle(ArticleRepositoryInterface $articles)
    {
        /* @var ArticleInterface|EloquentModel $article */
        foreach ($this->section->getArticles() as $article) {

            $this->dispatch(new SetPath($article));

            $articles->save($article);
        }
    }
}
