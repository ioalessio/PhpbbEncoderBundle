<?php

/**
 * This file is part of the PhpbbEncoderBundle
 *
 * (c) GaYA S.R.L <developers@gayalab.it>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gaya\Bundle\PhpbbEncoderBundle\Tests\Security\Encoder;

use Gaya\Bundle\PhpbbEncoderBundle\Security\Encoder\PhpbbEncoder;

/**
 * Testing class.
 *
 * @author Alessio Baglio <alessio@gayalab.it>
 */
class PhpbbEncoderTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Gaya\Bundle\PhpbbEncoderBundle\Security\Encoder\PhpbbEncoder
     */
    protected $object;

    protected function setUp() 
    {
        $this->object = new PhpbbEncoder;
    }

    public function testEncodePassword()
    {
        $raw     = '123qwe';        
        $encoded = $this->object->encodePassword($raw, null);
        $this->doTest($raw, $encoded);
    }

    /**
     * 
     * @param string $encoded
     * @param string $raw
     * @param string $salt
     * @return boolean
     */
    public function TestIsPasswordValid()
    {
        $raw     = '123qwe';
        $encoded = '$H$9jfURujsoIMOl.DBiIiQCYOkh6nvr..';        
        $this->doTest($raw, $encoded);
        
        $raw     = '123qwe';        
        $encoded = '$H$9rIWlOaVJiYgub7fz0ljHx5jIAiQEi1';
        $this->doTest($raw, $encoded);

        $raw     = '123qwe';        
        $encoded = '$H$9WAXx7BRomJdkhpHsPubMFbZP.JxSi0';
        $this->doTest($raw, $encoded);
        
    }
    
    protected function doTest($raw, $encoded){
        $this->assertTrue($this->object->isPasswordValid($encoded, $raw));        
    }

}
