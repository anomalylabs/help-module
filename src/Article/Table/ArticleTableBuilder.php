<?php namespace Anomaly\HelpModule\Article\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class ArticleTableBuilder
 *
 * @link          http://pyrocms.com
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\HelpModule\Article\Table
 */
class ArticleTableBuilder extends TableBuilder
{

    /**
     * The table buttons.
     *
     * @var array
     */
    protected $buttons = [
        'edit',
        'view',
    ];
}
