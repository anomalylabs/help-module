<?php namespace Anomaly\HelpModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

/**
 * Class HelpModuleServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\HelpModule
 */
class HelpModuleServiceProvider extends AddonServiceProvider
{

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'admin/help'                      => 'Anomaly\HelpModule\Http\Controller\Admin\ArticlesController@index',
        'admin/help/create'               => 'Anomaly\HelpModule\Http\Controller\Admin\ArticlesController@create',
        'admin/help/edit/{id}'            => 'Anomaly\HelpModule\Http\Controller\Admin\ArticlesController@edit',
        'admin/help/categories'           => 'Anomaly\HelpModule\Http\Controller\Admin\CategoriesController@index',
        'admin/help/categories/create'    => 'Anomaly\HelpModule\Http\Controller\Admin\CategoriesController@create',
        'admin/help/categories/edit/{id}' => 'Anomaly\HelpModule\Http\Controller\Admin\CategoriesController@edit',
        'admin/help/sections'             => 'Anomaly\HelpModule\Http\Controller\Admin\SectionsController@index',
        'admin/help/sections/create'      => 'Anomaly\HelpModule\Http\Controller\Admin\SectionsController@create',
        'admin/help/sections/edit/{id}'   => 'Anomaly\HelpModule\Http\Controller\Admin\SectionsController@edit'
    ];

    /**
     * The addon bindings.
     *
     * @var array
     */
    protected $bindings = [
        'Anomaly\HelpModule\Article\ArticleRepository'               => 'Anomaly\HelpModule\Article\ArticleRepository',
        'Anomaly\Streams\Platform\Model\Help\HelpArticlesEntryModel' => 'Anomaly\HelpModule\Article\ArticleRepository'
    ];

    /**
     * The addon singleton bindings.
     *
     * @var array
     */
    protected $singletons = [
        'Anomaly\HelpModule\Article\Contract\ArticleRepositoryInterface' => 'Anomaly\HelpModule\Article\ArticleRepository'
    ];

}
