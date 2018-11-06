<?php

class TestClass extends PHPUnit_Framework_TestCase
{
        public function testFile()
        {
                ob_start();
                include 'Login.php';
                $content = ob_get_contents();
                ob_end_clean();
                $this->assertEquals('<a href="http://mediabisnisonline.com">Klik link ini</a>', $content);
        }
}