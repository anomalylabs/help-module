<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleHelp_1_0_0_CreateHelpFields
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModuleHelp_1_0_0_CreateHelpFields extends Migration
{

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [
        'title'       => 'anomaly.field_type.text',
        'slug'        => 'anomaly.field_type.slug',
        'content'     => 'anomaly.field_type.wysiwyg',
        'section'     => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'Anomaly\HelpModule\Section\SectionModel'
            ]
        ],
        'promoted'    => 'anomaly.field_type.boolean',
        'comments'    => 'anomaly.field_type.boolean',
        'keywords'    => 'anomaly.field_type.tags',
        'name'        => 'anomaly.field_type.text',
        'description' => 'anomaly.field_type.textarea',
        'category'    => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'Anomaly\HelpModule\Category\CategoryModel'
            ]
        ],
    ];

}
