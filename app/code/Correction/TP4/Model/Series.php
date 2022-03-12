<?php
namespace Correction\TP4\Model;

use Magento\Framework\Model\AbstractModel;
use Correction\TP4\Model\ResourceModel\Series as SeriesResourceModel;

class Series extends AbstractModel
{
    const SERIES_ID = 'series_id';
    const NAME = 'name';
    const COLOR = 'color';

    protected $_idFieldName = 'series_id';

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(SeriesResourceModel::class);
    }

    /**
     * Get series id
     *
     * @return int
     */
    public function getSeriesId()
    {
        return $this->getData(self::SERIES_ID);
    }

    /**
     * Set series id
     *
     * @param int $seriesId
     * @return $this
     */
    public function setSeriesId($seriesId)
    {
        return $this->setData(self::SERIES_ID, $seriesId);
    }

    /**
     * Get series name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->getData(self::NAME);
    }

    /**
     * Set series name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Get color value
     *
     * @return string
     */
    public function getColor()
    {
        return $this->getData(self::COLOR);
    }

    /**
     * Set color value
     *
     * @param string $color
     * @return $this
     */
    public function setColor(string $color)
    {
        return $this->setData(self::COLOR, $color);
    }
}
