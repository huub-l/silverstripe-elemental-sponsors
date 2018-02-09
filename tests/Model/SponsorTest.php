<?php

namespace Dynamic\Elements\Tests\Model;

use Dynamic\Elements\Model\Sponsor;
use Sheadawson\Linkable\Forms\LinkField;
use SilverStripe\Dev\SapphireTest;

/**
 * Class SponsorTest
 * @package Dynamic\Elements\Tests\Model
 */
class SponsorTest extends SapphireTest
{
    /**
     * @var string
     */
    protected static $fixture_file = '../fixtures.yml';

    /**
     *
     */
    public function testGetCMSFields()
    {
        $sponsor = Sponsor::singleton();
        $this->assertInstanceOf(LinkField::class, $sponsor->getCMSFields()->dataFieldByName('LinkID'));
    }
}
