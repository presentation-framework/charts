<?php

namespace Presentation\Charts\Component;


use Presentation\Charts\Chart;
use Presentation\Framework\Base\AbstractComponent;
use Presentation\Framework\Initialization\InitializableInterface;
use Presentation\Framework\Initialization\InitializableTrait;

class ChartContainer extends AbstractComponent implements InitializableInterface
{
    use InitializableTrait;
    public function render()
    {

        $this->emit('render', [$this]);
        if (!$this->isVisible()) {
            return '';
        }

        /** @var Chart $chart */
        $chart = $this->requireInitializer();
        /** @var RecordView $recordView */
        $recordView = $chart->getRecordView();
        $recordView->resetValues();
        $this->renderChildren();
        $values = json_encode($recordView->getValues(), JSON_PRETTY_PRINT);
        //return $this->renderChildren();
        return "
        <div id=\"{$chart->getComponentName()}\" style=\"width: 1600px; height: 700px\"></div>
        <script type=\"text / javascript\">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(function () {
               var data = google.visualization.arrayToDataTable($values);
               var options = {
                    title: 'Chart Title',
                    curveType: 'function',
                    legend: { position: 'bottom' }
                };

                var chart = new google.visualization.LineChart(document.getElementById('{$chart->getComponentName()}'));

                chart.draw(data, options);
            });
        </script>
        ";
    }
}