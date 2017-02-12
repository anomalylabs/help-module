<?php namespace Anomaly\HelpModule\Article\Command;

use Anomaly\HelpModule\Article\ArticlePresenter;
use Anomaly\HelpModule\Article\Contract\ArticleInterface;
use Anomaly\HelpModule\Article\Contract\ArticleRepositoryInterface;
use Anomaly\Streams\Platform\Model\EloquentModel;
use Anomaly\Streams\Platform\View\ViewTemplate;


/**
 * Class GetArticle
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class GetArticle
{

    /**
     * The identifier.
     *
     * @var mixed
     */
    protected $identifier;

    /**
     * Create a new GetArticle instance.
     *
     * @param $identifier
     */
    public function __construct($identifier = null)
    {
        $this->identifier = $identifier;
    }

    /**
     * Handle the command.
     *
     * @param  ArticleRepositoryInterface $articles
     * @param  ViewTemplate               $template
     * @return ArticleInterface|EloquentModel|null
     */
    public function handle(ArticleRepositoryInterface $articles, ViewTemplate $template)
    {
        if (is_null($this->identifier)) {
            $this->identifier = $template->get('article');
        }

        if (is_numeric($this->identifier)) {
            return $articles->find($this->identifier);
        }

        if (is_string($this->identifier)) {
            return $articles->findByPath($this->identifier);
        }

        if ($this->identifier instanceof ArticleInterface) {
            return $this->identifier;
        }

        if ($this->identifier instanceof ArticlePresenter) {
            return $this->identifier->getObject();
        }

        return null;
    }
}
