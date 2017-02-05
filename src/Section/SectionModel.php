<?php namespace Anomaly\HelpModule\Section;

use Anomaly\HelpModule\Section\Contract\SectionInterface;
use Anomaly\Streams\Platform\Model\Help\HelpSectionsEntryModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class SectionModel
 *
 * @link          http://pyrocms.com
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\HelpModule\Section
 */
class SectionModel extends HelpSectionsEntryModel implements SectionInterface
{

    /**
     * Get the related articles.
     *
     * @return SectionCollection
     */
    public function getArticles()
    {
        return $this->articles;
    }

    /**
     * Return the articles relation.
     *
     * @return HasMany
     */
    public function articles()
    {
        return $this->hasMany('Anomaly\HelpModule\Article\ArticleModel', 'section_id');
    }
}
