<?php
namespace Geissler\Converter;

use Geissler\Converter\Standard\BibTeX\BibTeX;
use Geissler\Converter\Standard\CSL\CSL;
use Geissler\Converter\Standard\RIS\RIS;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-03-10 at 15:02:07.
 */
class ConverterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Converter
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Converter;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Geissler\Converter\Converter::convert
     * @dataProvider dataProviderForConvert
     */
    public function testConvert($from, $to, $output)
    {
        $this->assertEquals($output, $this->object->convert($from, $to));
    }

    public function dataProviderForConvert()
    {
        return array(
            array(
                new CSL('[
      {
          "id": "ITEM-1",
          "author" : [
             {
                "family": "Wallace-Hadrill",
                "given": "Andrew"
             },
             {
                "family": "Zanker",
                "given": "Paul"
             },
             {
                "family": "Boschung",
                "given": "Dieter"
             }
          ],
          "issued": {
              "date-parts": [
                  [
                      "2011"
                  ]
              ]
          },
          "title": "The monumental centre of Herculaneum. In search of the identities of the public buildings",
          "container-title" : "Journal of Roman archaeology",
          "volume" : "24",
          "page" : "121-160",
          "type": "article-journal"
      }]'
                ),
                new BibTeX(),
                '@article{article,
author = {Wallace-Hadrill, Andrew and Zanker, Paul and Boschung, Dieter},
year = {2011},
pages = {121-160},
title = {The monumental centre of Herculaneum. In search of the identities of the public buildings},
booktitle = {Journal of Roman archaeology}
}'
            ),
            array(
                new RIS('TY  - JOUR
TI  - Die Grundlage der allgemeinen Relativitätstheorie
AU  - Einstein, Albert
PY  - 1916
SP  - 769
EP  - 822
JO  - Annalen der Physik
VL  - 49
ER  - '),
                new BibTeX(),
                '@article{article,
author = {Einstein, Albert},
year = {1916},
pages = {769-822},
title = {Die Grundlage der allgemeinen Relativitätstheorie},
volume = {49}
}'
            ),
            array(
                new BibTeX('@article{article,
author = {Einstein, Albert},
year = {1916},
pages = {769-822},
title = {Die Grundlage der allgemeinen Relativitätstheorie},
volume = {49}
}'),
                new CSL(),
                '[{"type":"article","author":[{"family":"Einstein","given":"Albert"}],"issued":[{"year":"1916"}],"page":"769-822","page-first":"769","citation-label":"article","title":"Die Grundlage der allgemeinen Relativit\u00e4tstheorie"}]'
            )
        );
    }

    /**
     * @covers Geissler\Converter\Converter::convert
     */
    public function testDoNotConvert()
    {
        $this->assertEquals('Error! The data could not be parsed!', $this->object->convert(new BibTeX(), new RIS()));
    }
}
