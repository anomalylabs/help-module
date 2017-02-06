<?php

return [
    'title'            => [
        'name'         => 'Title',
        'placeholder'  => config('streams.app.name') . ' 101: Introduction',
        'instructions' => 'What is the title of the article?',
    ],
    'slug'             => [
        'name'         => 'Slug',
        'placeholder'  => str_slug(config('streams.app.name') . ' 101: Introduction'),
        'instructions' => 'What is the title of the article?',
    ],
    'content'          => [
        'name'         => 'Content',
        'instructions' => 'Write the article content below.',
    ],
    'section'          => [
        'name'         => 'Section',
        'placeholder'  => 'Please choose a section...',
        'instructions' => 'What section should the article display in?',
    ],
    'enabled'          => [
        'name'         => 'Enabled',
        'instructions' => 'Items will only display if enabled.',
    ],
    'tags'             => [
        'name'         => 'Tags',
        'instructions' => 'Tags make it easier for you to organize related articles.',
    ],
    'name'             => [
        'name'         => 'Name',
        'placeholder'  => 'Introduction',
        'instructions' => 'What is the name of this category?',
    ],
    'description'      => [
        'name'         => 'Description',
        'instructions' => 'Briefly describe this category.',
    ],
    'category'         => [
        'name' => 'Category',
    ],
    'meta_title'       => [
        'name'         => 'Meta Title',
        'instructions' => 'Specify the SEO title.',
        'warning'      => 'The title will be used by default.',
    ],
    'meta_description' => [
        'name'         => 'Meta Description',
        'instructions' => 'Specify the SEO description.',
    ],
    'meta_keywords'    => [
        'name'         => 'Meta Keywords',
        'instructions' => 'Specify the SEO keywords.',
    ],
    'theme_layout'     => [
        'name'         => 'Theme Layout',
        'instructions' => 'Specify the theme layout to wrap the <strong>article layout</strong> with.',
    ],
    'layout'           => [
        'name'         => 'Layout',
        'instructions' => 'The layout is used for displaying the article\'s content.',
    ],
];
