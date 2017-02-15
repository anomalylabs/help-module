<?php

use Anomaly\HelpModule\Article\Contract\ArticleInterface;
use Anomaly\HelpModule\Article\Contract\ArticleRepositoryInterface;
use Roumen\Sitemap\Sitemap;

return [
    'lastmod' => function (ArticleRepositoryInterface $articles) {

        if (!$article = $articles->lastModified()) {
            return null;
        }

        return $article->lastModified()->toAtomString();
    },
    'entries' => function (ArticleRepositoryInterface $articles) {
        return $articles->all();
    },
    'handler' => function (Sitemap $sitemap, ArticleInterface $entry) {

        $sitemap->add(
            url($entry->route('view')),
            $entry->lastModified()->toAtomString(),
            0.5,
            'monthly'
        );
    },
];
