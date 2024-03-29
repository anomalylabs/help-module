<?php namespace Anomaly\HelpModule\Article;

use Anomaly\HelpModule\Article\Contract\ArticleInterface;
use Anomaly\Streams\Platform\View\ViewTemplate;

/**
 * Class ArticleLoader
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class ArticleLoader
{

    /**
     * The template data.
     *
     * @var ViewTemplate
     */
    protected $template;

    /**
     * Create a new ArticleLoader instance.
     *
     * @param ViewTemplate $template
     */
    public function __construct(ViewTemplate $template)
    {
        $this->template = $template;
    }

    /**
     * Load article data to the template.
     *
     * @param ArticleInterface $article
     */
    public function load(ArticleInterface $article)
    {
        $this->template->set('title', $article->getTitle());
        $this->template->set('meta_title', $article->metaTitle());
        $this->template->set('meta_description', $article->metaDescription());
    }
}
