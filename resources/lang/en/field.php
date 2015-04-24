<?php

return [
    'title'       => [
        'name'         => 'Title',
        'placeholder'  => config('streams.app.name') . ' 101: Introduction',
        'instructions' => 'What is the title of the article?'
    ],
    'slug'        => [
        'name'         => 'Slug',
        'placeholder'  => str_slug(config('streams.app.name') . ' 101: Introduction'),
        'instructions' => 'What is the title of the article?'
    ],
    'content'     => [
        'name'         => 'Content',
        'instructions' => 'Write the article content below.'
    ],
    'section'     => [
        'name'         => 'Section',
        'placeholder'  => 'Please choose a section...',
        'instructions' => 'What section should the article display in?'
    ],
    'enabled'     => [
        'name'         => 'Enabled',
        'instructions' => 'Items will only display if enabled.'
    ],
    'promoted'    => [
        'name'         => 'Promoted',
        'label'        => 'Promote this article?',
        'instructions' => 'Promoted articles display at the top.'
    ],
    'comments'    => [
        'name'         => 'Comments',
        'label'        => 'Enable comments for this article?',
        'instructions' => 'Comments help engage the community.'
    ],
    'keywords'    => [
        'name'         => 'Keywords',
        'instructions' => 'Keywords are used for searching help articles.'
    ],
    'name'        => [
        'name'         => 'Name',
        'placeholder'  => 'Introduction',
        'instructions' => 'What is the name of this category?'
    ],
    'description' => [
        'name'         => 'Description',
        'instructions' => 'Briefly describe this category.'
    ]
];
