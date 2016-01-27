<?php


namespace Presentation\Charts\Component;


use Presentation\Charts\Chart;
use Presentation\Charts\FieldView;
use Presentation\Framework\Base\AbstractDataView;
use Presentation\Framework\Initialization\InitializableInterface;
use Presentation\Framework\Initialization\InitializableTrait;

class RecordView extends AbstractDataView implements InitializableInterface
{
    use InitializableTrait;

    private $values;

    /**
     * @return Chart
     */
    private function getChart()
    {
        return $this->requireInitializer();
    }

    public function renderData()
    {
        $row = [];
        /** @var FieldView $fieldView */
        foreach($this->getChart()->children()->filterByType(FieldView::class) as $fieldView) {
            $row[] = \mp\getValue($this->data, $fieldView->getDataFieldName());
        }
        $this->values[] = $row;
        return '';
    }

}