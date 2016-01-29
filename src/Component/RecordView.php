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

    private $values = [];

    /**
     * @return Chart
     */
    private function getChart()
    {
        return $this->requireInitializer();
    }

    public function renderData()
    {
        /** @var FieldView[] $fieldViews */
        $fieldViews = $this->getChart()->children()->filterByType(FieldView::class);
        if (count($this->values) === 0 ) {
            $header  = [];
            foreach($fieldViews as $fieldView) {
                $header[] = $fieldView->getLabel();
            }
            $this->values = $header;
        }
        $row = [];

        foreach($fieldViews as $fieldView) {
            $row[] = \mp\getValue($this->data, $fieldView->getDataFieldName());
        }
        $this->values[] = $row;
        return '';
    }

    public function getValues()
    {
        return $this->values;
    }

    public function resetValues()
    {
        $this->values = [];
    }

}