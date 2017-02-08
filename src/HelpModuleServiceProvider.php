<?php namespace Anomaly\HelpModule;

use Anomaly\HelpModule\Article\ArticleModel;
use Anomaly\HelpModule\Article\ArticleRepository;
use Anomaly\HelpModule\Article\Contract\ArticleRepositoryInterface;
use Anomaly\HelpModule\Category\CategoryModel;
use Anomaly\HelpModule\Category\CategoryRepository;
use Anomaly\HelpModule\Category\Contract\CategoryRepositoryInterface;
use Anomaly\HelpModule\Section\Contract\SectionRepositoryInterface;
use Anomaly\HelpModule\Section\SectionModel;
use Anomaly\HelpModule\Section\SectionRepository;
use Anomaly\HelpModule\Type\Contract\TypeRepositoryInterface;
use Anomaly\HelpModule\Type\TypeModel;
use Anomaly\HelpModule\Type\TypeRepository;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Model\Help\HelpArticlesEntryModel;
use Anomaly\Streams\Platform\Model\Help\HelpCategoriesEntryModel;
use Anomaly\Streams\Platform\Model\Help\HelpSectionsEntryModel;
use Anomaly\Streams\Platform\Model\Help\HelpTypesEntryModel;

/**
 * Class HelpModuleServiceProvider
 *
 * @link          http://pyrocms.com
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
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
        'help'                   => [
            'as'   => 'anomaly.module.help::articles.index',
            'uses' => 'Anomaly\HelpModule\Http\Controller\ArticlesController@index',
        ],
        'help/articles/{slug}'   => [
            'as'   => 'anomaly.module.help::articles.view',
            'uses' => 'Anomaly\HelpModule\Http\Controller\ArticlesController@view',
        ],
        'help/preview/{str_id}'  => [
            'as'   => 'anomaly.module.help::articles.preview',
            'uses' => 'Anomaly\HelpModule\Http\Controller\ArticlesController@preview',
        ],
        'help/sections/{slug}'   => [
            'as'   => 'anomaly.module.help::sections.view',
            'uses' => 'Anomaly\HelpModule\Http\Controller\SectionsController@view',
        ],
        'help/categories/{slug}' => [
            'as'   => 'anomaly.module.help::categories.view',
            'uses' => 'Anomaly\HelpModule\Http\Controller\CategoriesController@view',
        ],

        'admin/help'                                               => 'Anomaly\HelpModule\Http\Controller\Admin\ArticlesController@index',
        'admin/help/create'                                        => 'Anomaly\HelpModule\Http\Controller\Admin\ArticlesController@create',
        'admin/help/choose'                                        => 'Anomaly\HelpModule\Http\Controller\Admin\ArticlesController@choose',
        'admin/help/edit/{id}'                                     => 'Anomaly\HelpModule\Http\Controller\Admin\ArticlesController@edit',
        'admin/help/view/{id}'                                     => 'Anomaly\HelpModule\Http\Controller\Admin\ArticlesController@view',
        'admin/help/sections'                                      => 'Anomaly\HelpModule\Http\Controller\Admin\SectionsController@index',
        'admin/help/sections/create'                               => 'Anomaly\HelpModule\Http\Controller\Admin\SectionsController@create',
        'admin/help/sections/edit/{id}'                            => 'Anomaly\HelpModule\Http\Controller\Admin\SectionsController@edit',
        'admin/help/categories'                                    => 'Anomaly\HelpModule\Http\Controller\Admin\CategoriesController@index',
        'admin/help/categories/create'                             => 'Anomaly\HelpModule\Http\Controller\Admin\CategoriesController@create',
        'admin/help/categories/edit/{id}'                          => 'Anomaly\HelpModule\Http\Controller\Admin\CategoriesController@edit',
        'admin/help/fields'                                        => 'Anomaly\HelpModule\Http\Controller\Admin\FieldsController@index',
        'admin/help/fields/choose'                                 => 'Anomaly\HelpModule\Http\Controller\Admin\FieldsController@choose',
        'admin/help/fields/create'                                 => 'Anomaly\HelpModule\Http\Controller\Admin\FieldsController@create',
        'admin/help/fields/edit/{id}'                              => 'Anomaly\HelpModule\Http\Controller\Admin\FieldsController@edit',
        'admin/help/fields/assignments/{stream}'                   => 'Anomaly\HelpModule\Http\Controller\Admin\AssignmentsController@index',
        'admin/help/fields/assignments/{stream}/choose'            => 'Anomaly\HelpModule\Http\Controller\Admin\AssignmentsController@choose',
        'admin/help/fields/assignments/{stream}/create'            => 'Anomaly\HelpModule\Http\Controller\Admin\AssignmentsController@create',
        'admin/help/fields/assignments/{stream}/edit/{assignment}' => 'Anomaly\HelpModule\Http\Controller\Admin\AssignmentsController@edit',
    ];

    /**
     * The addon bindings.
     *
     * @var array
     */
    protected $bindings = [
        HelpTypesEntryModel::class      => TypeModel::class,
        HelpArticlesEntryModel::class   => ArticleModel::class,
        HelpSectionsEntryModel::class   => SectionModel::class,
        HelpCategoriesEntryModel::class => CategoryModel::class,
    ];

    /**
     * The addon singleton bindings.
     *
     * @var array
     */
    protected $singletons = [
        TypeRepositoryInterface::class     => TypeRepository::class,
        ArticleRepositoryInterface::class  => ArticleRepository::class,
        SectionRepositoryInterface::class  => SectionRepository::class,
        CategoryRepositoryInterface::class => CategoryRepository::class,
    ];

}
