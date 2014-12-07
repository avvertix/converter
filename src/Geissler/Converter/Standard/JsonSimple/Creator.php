<?php
namespace Geissler\Converter\Standard\JsonSimple;

use Geissler\Converter\Interfaces\CreatorInterface;
use Geissler\Converter\Model\Entries;
use Geissler\Converter\Model\Persons;

/**
 * TODO: Creator comment.
 *
 * @author  Benjamin Geißler <benjamin.geissler@gmail.com>
 * @license MIT
 */
class Creator implements CreatorInterface
{

    private $enc = null;

    /**
     * Create entries based on the given standard from the \Geissler\Converter\Model\Entries object.
     *
     * @param \Geissler\Converter\Model\Entries $data
     * @return boolean
     */
    public function create(Entries $data)
    {
        // TODO: Implement create() method.
        $this->enc = json_encode( $data );
    }

    /**
     * Retrieve the created standard data. Return false if standard could not be created.
     *
     * @return string|boolean
     */
    public function retrieve()
    {
        // TODO: Implement retrieve() method.
        if( is_null( $this->enc ) ){
            return false;
        }

        return $this->enc;
    }
}
