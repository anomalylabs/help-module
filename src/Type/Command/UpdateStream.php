<?php namespace Anomaly\HelpModule\Type\Command;

use Anomaly\HelpModule\Type\Contract\TypeInterface;
use Anomaly\HelpModule\Type\Contract\TypeRepositoryInterface;
use Anomaly\Streams\Platform\Stream\Contract\StreamInterface;
use Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class UpdateStream
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class UpdateStream
{

    use DispatchesJobs;

    /**
     * The article type instance.
     *
     * @var TypeInterface
     */
    protected $type;

    /**
     * Update a new UpdateStream instance.
     *
     * @param TypeInterface $type
     */
    public function __construct(TypeInterface $type)
    {
        $this->type = $type;
    }

    /**
     * Handle the command.
     *
     * @param StreamRepositoryInterface $streams
     * @param TypeRepositoryInterface   $types
     * @param Repository                $config
     */
    public function handle(StreamRepositoryInterface $streams, TypeRepositoryInterface $types, Repository $config)
    {
        /* @var TypeInterface $type */
        $type = $types->find($this->type->getId());

        /* @var StreamInterface $stream */
        $stream = $type->getEntryStream();

        $stream->fill(
            [
                $config->get('app.fallback_locale') => [
                    'name'        => $this->type->getName(),
                    'description' => $this->type->getDescription(),
                ],
                'slug'                              => $this->type->getSlug() . '_articles',
            ]
        );

        $streams->save($stream);
    }
}
