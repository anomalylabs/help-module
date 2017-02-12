<?php namespace Anomaly\HelpModule\Category\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class CategoryFormBuilder
 *
 * @link          http://pyrocms.com
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\HelpModule\Category\Form
 */
class CategoryFormBuilder extends FormBuilder
{

    /**
     * The form sections.
     *
     * @var array
     */
    protected $sections = [
        'general' => [
            'fields' => [
                'name',
                'slug',
                'description',
            ],
        ],
        'seo'     => [
            'fields' => [
                'meta_title',
                'meta_description',
            ],
        ],
    ];
}
