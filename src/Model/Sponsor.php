<?php

namespace Dynamic\Elements\Model;

use Dynamic\Elements\Elements\ElementSponsor;
use Sheadawson\Linkable\Forms\LinkField;
use Sheadawson\Linkable\Models\Link;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataObject;

/**
 * Class Sponsor
 * @package Dynamic\Elements\Model
 *
 * @property string $Title
 * @property int $LogoID
 * @property int $LinkID
 */
class Sponsor extends DataObject
{
    /**
     * @var string
     */
    private static $singular_name = 'Sponsor';

    /**
     * @var string
     */
    private static $plural_name = 'Sponsors';

    /**
     * @var string
     */
    private static $table_name = 'Sponsor';

    /**
     * @var array
     */
    private static $db = [
        'Title' => 'Varchar(255)',
    ];

    /**
     * @var array
     */
    private static $has_one = [
        'Logo' => Image::class,
        'Link' => Link::class,
    ];

    /**
     * @var array
     */
    private static $belongs_many_many = [
        'SponsorsElements' => ElementSponsor::class,
    ];

    /**
     * @var array
     */
    private static $owns = [
        'Logo',
    ];

    /**
     * @var array
     */
    private static $summary_fields = [
        'Title' => [
            'title' => 'Name',
        ],
        'Logo.CMSThumbnail' => [
            'title' => 'Logo',
        ],
    ];

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->replaceField(
            'LinkID',
            LinkField::create('LinkID')
                ->setTitle('Sponsor Link')
        );

        return $fields;
    }
}
