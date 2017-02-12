<?php

return [
    'title'            => [
        'name'         => 'Title',
        'instructions' => 'Specify a descriptive article title.',
    ],
    'slug'             => [
        'name'         => 'Slug',
        'instructions' => [
            'articles'   => 'The slug is used in building the article\'s URL.',
            'sections'   => 'The slug is used in building the section\'s URL.',
            'categories' => 'The slug is used in building the category\'s URL.',
            'types'      => 'The slug is used in making the database table for articles of this type.',
        ],
    ],
    'section'          => [
        'name'         => 'Section',
        'instructions' => 'Choose which category section this article belong to.',
    ],
    'enabled'          => [
        'name'         => 'Enabled',
        'instructions' => 'Articles will only display if enabled.',
    ],
    'tags'             => [
        'name'         => 'Tags',
        'instructions' => 'Tags make it easier for you to organize related articles.',
    ],
    'name'             => [
        'name'         => 'Name',
        'instructions' => [
            'types'      => 'Specify a short descriptive name for this article type.',
            'categories' => 'Specify a short descriptive name for this category.',
            'sections'   => 'Specify a short descriptive name for this section.',
        ],
    ],
    'description'      => [
        'name'         => 'Description',
        'instructions' => [
            'types'      => 'Briefly describe the article type.',
            'categories' => 'Briefly describe the category.',
        ],
    ],
    'category'         => [
        'name'         => 'Category',
        'instructions' => 'Choose which category this section belongs to.',
    ],
    'meta_title'       => [
        'name'         => 'Meta Title',
        'instructions' => 'Specify the SEO title.',
        'warning'      => [
            'articles'   => 'The title will be used by default.',
            'sections'   => 'The name will be used by default.',
            'categories' => 'The name will be used by default.',
        ],
    ],
    'meta_description' => [
        'name'         => 'Meta Description',
        'instructions' => [
            'articles'   => 'Specify the SEO description.',
            'sections'   => 'The description will be used by default.',
            'categories' => 'The description will be used by default.',
        ],
    ],
    'theme_layout'     => [
        'name'         => 'Theme Layout',
        'instructions' => 'Specify the theme layout to wrap the <strong>article layout</strong> with.',
    ],
    'layout'           => [
        'name'         => 'Article Layout',
        'instructions' => 'The layout is used for displaying the article\'s content.',
    ],
    'article'          => [
        'name' => 'Article',
    ],
];
