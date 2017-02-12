<?php namespace Anomaly\HelpModule\Article;

use Anomaly\HelpModule\Article\Contract\ArticleRepositoryInterface;
use Anomaly\HelpModule\Type\Contract\TypeRepositoryInterface;
use Anomaly\Streams\Platform\Database\Seeder\Seeder;

/**
 * Class ArticleSeeder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ArticleSeeder extends Seeder
{

    /**
     * The article repository.
     *
     * @var ArticleRepositoryInterface
     */
    protected $articles;

    /**
     * The types repository.
     *
     * @var TypeRepositoryInterface
     */
    protected $types;

    /**
     * Create a new ArticleSeeder instance.
     *
     * @param ArticleRepositoryInterface $articles
     * @param TypeRepositoryInterface    $types
     */
    public function __construct(ArticleRepositoryInterface $articles, TypeRepositoryInterface $types)
    {
        $this->articles = $articles;
        $this->types    = $types;
    }

    /**
     * Run the seeder.
     */
    public function run()
    {
        $this->articles->truncate();

        $type = $this->types->findBySlug('default');

        $this->articles->create(
            [
                'en'           => [
                    'title' => 'Welcome',
                ],
                'slug'         => 'welcome',
                'entry'        => $type->getEntryModel()->create(
                    [
                        'en' => [
                            'content' => '<p>Welcome to PyroCMS!</p>',
                        ],
                    ]
                ),
                'type'         => $type,
                'enabled'      => true,
                'home'         => true,
                'theme_layout' => 'theme::layouts/default.twig',
            ]
        )->allowedRoles()->sync([]);

        $this->articles->create(
            [
                'en'           => [
                    'title' => 'Contact',
                ],
                'slug'         => 'contact',
                'entry'        => $type->getEntryModel()->create(
                    [
                        'en' => [
                            'content' => '<p>Drop us a line! We\'d love to hear from you!</p><p><br></p>
<p>{{ form(\'contact\').to(\'example@domain.com\')|raw }}</p>',
                        ],
                    ]
                ),
                'type'         => $type,
                'enabled'      => true,
                'theme_layout' => 'theme::layouts/default.twig',
            ]
        )->allowedRoles()->sync([]);
    }
}
