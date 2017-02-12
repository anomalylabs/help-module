<?php namespace Anomaly\HelpModule\Article\Form;

use Anomaly\HelpModule\Article\Contract\ArticleInterface;
use Anomaly\HelpModule\Type\Contract\TypeInterface;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class ArticleFormBuilder
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class ArticleFormBuilder extends FormBuilder
{

    /**
     * The article type.
     *
     * @var null|TypeInterface
     */
    protected $type = null;

    /**
     * The parent article.
     *
     * @var null|ArticleInterface
     */
    protected $parent = null;

    /**
     * Skip these fields.
     *
     * @var array
     */
    protected $skips = [
        'str_id',
        'path',
        'type',
        'entry',
        'parent',
    ];

    /**
     * Fired when the builder is ready to build.
     *
     * @throws \Exception
     */
    public function onReady()
    {
        if (!$this->getType() && !$this->getEntry()) {
            throw new \Exception('The $type parameter is required when creating a article.');
        }
    }

    /**
     * Get the type.
     *
     * @return TypeInterface|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the type.
     *
     * @param  TypeInterface $type
     * @return $this
     */
    public function setType(TypeInterface $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Fired just before saving the form.
     */
    public function onSaving()
    {
        $entry  = $this->getFormEntry();
        $parent = $this->getParent();
        $type   = $this->getType();

        if (!$entry->type_id) {
            $entry->type_id = $type->getId();
        }

        if ($parent) {
            $entry->parent_id = $parent->getId();
        }
    }

    /**
     * Get the parent article.
     *
     * @return null|ArticleInterface
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set the parent article.
     *
     * @param  ArticleInterface $parent
     * @return $this
     */
    public function setParent(ArticleInterface $parent)
    {
        $this->parent = $parent;

        return $this;
    }
}
