<?php namespace Anomaly\HelpModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

/**
 * Class HelpModule
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\HelpModule
 */
class HelpModule extends Module
{

    /**
     * The module icon.
     *
     * @var string
     */
    protected $icon = 'circle-question-mark';

    protected $sections = [
        'articles'  => [
            'buttons' => [
                'new_article'
            ]
        ],
        'questions' => [
            'buttons' => [
                'new_question'
            ]
        ]
    ];

}