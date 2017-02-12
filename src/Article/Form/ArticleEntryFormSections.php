<?php namespace Anomaly\HelpModule\Article\Form;

use Anomaly\HelpModule\Article\ArticleModel;
use Anomaly\Streams\Platform\Addon\FieldType\FieldType;

/**
 * Class ArticleEntryFormSections
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class ArticleEntryFormSections
{

    /**
     * Handle the form sections.
     *
     * @param ArticleEntryFormBuilder $builder
     */
    public function handle(ArticleEntryFormBuilder $builder)
    {
        $builder->setSections(
            [
                'general' => [
                    'fields' => [
                        'article_title',
                        'article_slug',
                        'article_section',
                    ],
                ],
                'example' => [
                    'fields' => function (ArticleEntryFormBuilder $builder) {
                        return array_map(
                            function (FieldType $field) {
                                return 'entry_' . $field->getField();
                            },
                            array_filter(
                                $builder->getFormFields()->base()->all(),
                                function (FieldType $field) {
                                    return (!$field->getEntry() instanceof ArticleModel);
                                }
                            )
                        );
                    },
                ],
                'seo'     => [
                    'fields' => [
                        'article_meta_title',
                        'article_meta_description',
                    ],
                ],
                'options' => [
                    'fields' => [
                        'article_enabled',
                        'article_tags',
                    ],
                ],
            ]
        );
    }
}
