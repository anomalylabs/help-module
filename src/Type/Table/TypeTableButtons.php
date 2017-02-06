<?php namespace Anomaly\HelpModule\Type\Table;

use Anomaly\HelpModule\Type\Contract\TypeInterface;

class TypeTableButtons
{

    /**
     * Handle the buttons.
     *
     * @param TypeTableBuilder $builder
     */
    public function handle(TypeTableBuilder $builder)
    {
        $builder->setButtons(
            [
                'edit',
                'assignments' => [
                    'href' => function (TypeInterface $entry) {
                        return '/admin/help/fields/assignments/' . $entry->getEntryStreamId();
                    },
                ],
            ]
        );
    }
}
