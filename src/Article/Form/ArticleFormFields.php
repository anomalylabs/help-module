<?php namespace Anomaly\HelpModule\Article\Form;

use Anomaly\HelpModule\Article\Command\GetRealPath;
use Anomaly\HelpModule\Article\Contract\ArticleInterface;
use Illuminate\Foundation\Bus\DispatchesJobs;

class ArticleFormFields
{

    use DispatchesJobs;

    /**
     * Handle the article fields.
     *
     * @param ArticleFormBuilder $builder
     */
    public function handle(ArticleFormBuilder $builder)
    {
        $type   = $builder->getType();
        $parent = $builder->getParent();

        /* @var ArticleInterface $entry */
        if (!$parent && $entry = $builder->getFormEntry()) {
            $parent = $entry->getParent();
        }

        $builder->setFields(
            [
                '*',
                'slug' => [
                    'config' => [
                        'prefix' => ($parent ? url($this->dispatch(new GetRealPath($parent))) : url('/')) . '/',
                    ],
                ],
            ]
        );
    }
}
