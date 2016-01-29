<?php

namespace Presentation\Charts\Test;

use PHPUnit_Framework_TestCase;
use Presentation\Charts\Axis;
use Presentation\Charts\Chart;
use Presentation\Charts\FieldView;
use Presentation\Framework\Data\ArrayDataProvider;

class ChartTest extends PHPUnit_Framework_TestCase
{
    public function test()
    {
        $chart = new Chart(new ArrayDataProvider([
            ['x'=> 1, 'y'=>20],
            ['x'=> 10, 'y'=>21],
            ['x'=> 20, 'y'=>11],
            ['x'=> 21, 'y'=>15],
            ['x'=> 50, 'y'=>0],
            ['x'=> 55, 'y'=>12],
        ]), [
            new Axis('x'),
            new FieldView('y', '--Y--')
        ]);
        echo $chart->render();
    }
}