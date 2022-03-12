<?php
/**
 * This file is part of Poe Series
 *
 * @author JC Lecas <jclecas@clever-age.com> <@CleverAge>
 * @category Poe
 * @package Poe\Series\Model
 * @license CleverAge
 * @copyright Copyright (c) 2022 Clever Age (https://www.clever-age.com)
 */

namespace Series\Model\Data;

use Magento\Framework\Model\AbstractModel;
use Series\Api\Data\SerieInterface;

class Serie extends AbstractModel implements SerieInterface
{
    /**
     * Event prefix
     *
     * @var string
     */
    protected $_eventPrefix = 'poe_serie';

    /**
     * Event object
     *
     * @var string
     */
    protected $_eventObject = 'poe_serie';

    /**
     * {@inheritdoc}
     */
    public function getSeriesId()
    {
        return $this->getData(self::SERIES_ID);
    }

    /**
     * {@inheritdoc}
     */
    public function setSeriesId($seriesId)
    {
        $this->setData(self::SERIES_ID, $seriesId);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->setData(self::NAME, $name);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getColor()
    {
        return $this->getData(self::COLOR);
    }

    /**
     * {@inheritdoc}
     */
    public function setColor($color)
    {
        $this->setData(self::COLOR, $color);
        return $this;
    }

}
