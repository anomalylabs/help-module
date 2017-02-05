<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleHelpCreateHelpFields
 *
 * @link          http://pyrocms.com
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class AnomalyModuleHelpCreateHelpFields extends Migration
{

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [
        'title'            => 'anomaly.field_type.text',
        'slug'             => [
            'type'   => 'anomaly.field_type.slug',
            'config' => [
                'type' => '-',
            ],
        ],
        'content'          => 'anomaly.field_type.wysiwyg',
        'section'          => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'mode'    => 'lookup',
                'related' => 'Anomaly\HelpModule\Section\SectionModel',
            ],
        ],
        'enabled'          => 'anomaly.field_type.boolean',
        'tags'             => 'anomaly.field_type.tags',
        'name'             => 'anomaly.field_type.text',
        'description'      => 'anomaly.field_type.textarea',
        'category'         => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'mode'    => 'lookup',
                'related' => 'Anomaly\HelpModule\Category\CategoryModel',
            ],
        ],
        'meta_title'       => 'anomaly.field_type.text',
        'meta_description' => 'anomaly.field_type.textarea',
        'meta_keywords'    => 'anomaly.field_type.tags',
    ];

}
