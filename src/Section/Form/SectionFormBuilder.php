<?php namespace Anomaly\HelpModule\Section\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class SectionFormBuilder
 *
 * @link          http://pyrocms.com
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\HelpModule\Section\Form
 */
class SectionFormBuilder extends FormBuilder
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
                'category',
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
