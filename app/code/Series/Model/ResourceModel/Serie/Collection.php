<?php
/**
 * This file is part of Poe Series
 *
 * @author JC Lecas <jclecas@clever-age.com> <@CleverAge>
 * @category Poe
 * @package Poe\Series\Model\ResourceModel\Serie
 * @license CleverAge
 * @copyright Copyright (c) 2022 Clever Age (https://www.clever-age.com)
 */

namespace Series\Model\ResourceModel\Serie;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Series\Model\Data\Serie;
use Series\Model\ResourceModel\Serie as SerieResource;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'series_id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(Serie::class, SerieResource::class);
    }
}
