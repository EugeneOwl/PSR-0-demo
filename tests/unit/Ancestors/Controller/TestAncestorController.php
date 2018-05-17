<?php

namespace UnitTests\Ancestors\Controller;

use \PHPUnit\Framework\TestCase;

class TestAncestorController extends TestCase
{
    private $performanceLimit = 1;

    /**
     * @test
     */
    public function runPerformance()
    {
        ob_start();
        $start = microtime(true);
        $this->fixture->run();
        $timeDifference = microtime(true) - $start;
        $this->assertLessThan($this->performanceLimit, $timeDifference, "Performance is too low");
        ob_end_clean();
    }
}