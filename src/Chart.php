<?php

namespace Presentation\Charts;

use Presentation\Charts\Component\ChartContainer;
use Presentation\Charts\Component\RecordView;
use Presentation\Framework\Component\ManagedList\ManagedList;

class Chart extends ManagedList
{
    public function __construct($dataProvider, array $components = [])
    {
        parent::__construct($dataProvider, null, $components);
    }

    protected function makeDefaultComponents()
    {
        $components =  array_merge(
            parent::makeDefaultComponents(),
            [
                'record_view' => new RecordView(),
                'list_container' => new ChartContainer()
            ]
        );
        return $components;
    }

}