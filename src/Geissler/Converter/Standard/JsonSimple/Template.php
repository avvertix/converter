<?php
namespace Geissler\Converter\Standard\JsonSimple;

use Geissler\Converter\Standard\Basic\StandardAbstract;
use Geissler\Converter\Standard\JsonSimple\Parser;
use Geissler\Converter\Standard\JsonSimple\Creator;

/**
 * TODO: JsonSimple comment.
 *
 * @author Benjamin Geißler <benjamin.geissler@gmail.com>
 * @license MIT
 */
class JsonSimple extends StandardAbstract
{
    /**
     * Constructor.
     *
     * @param string $data The data to parse.
     */
    public function __construct($data = '')
    {
        parent::__construct($data);
        $this->setParser(new Parser());
        $this->setCreator(new Creator());
    }
}
