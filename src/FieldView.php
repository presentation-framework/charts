<?php

namespace Presentation\Charts;


use Nayjest\Tree\ChildNodeInterface;
use Nayjest\Tree\ChildNodeTrait;
use Presentation\Framework\Base\AbstractComponent;

class FieldView implements ChildNodeInterface
{
    use ChildNodeTrait;
    protected $dataFieldName;

    /** @var  callable|null */
    protected $valueCalculator;
    /** @var  string|null */
    private $label;

    public function __construct($dataFieldName, $label = null)
    {
        $this->dataFieldName = $dataFieldName;
        $this->label = $label;
    }

    /**
     * @param string $dataFieldName
     * @return FieldView
     */
    public function setDataFieldName($dataFieldName)
    {
        $this->dataFieldName = $dataFieldName;
        return $this;
    }

    /**
     * @return string
     */
    public function getDataFieldName()
    {
        return $this->dataFieldName;
    }

    /**
     * @return callable|null
     */
    public function getValueCalculator()
    {
        return $this->valueCalculator;
    }

    /**
     * @param $valueCalculator
     * @return $this
     */
    public function setValueCalculator(callable $valueCalculator = null)
    {
        $this->valueCalculator = $valueCalculator;
        return $this;
    }


    /**
     * Returns text label that will be rendered in table header.
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label ?: ucwords(str_replace(array('-', '_', '.'), ' ', $this->dataFieldName));
    }

    /**
     * Sets text label that will be rendered in table header.
     *
     * @param string|null $label
     * @return $this
     */
    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }
}