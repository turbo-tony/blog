<?php

namespace AppBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class AppBundle extends Bundle
{
    public function testThisShitIsWorking()
    {
        // BAH
        yield 5;

        return 4;
    }

    public function yo()
    {
        return $this->testThisShitIsWorking();
    }
}
