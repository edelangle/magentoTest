<?php
/**
 * This file is part of Poe Series
 *
 * @author JC Lecas <jclecas@clever-age.com> <@CleverAge>
 * @category Poe
 * @package Poe\Series\Api\Data
 * @license CleverAge
 * @copyright Copyright (c) 2022 Clever Age (https://www.clever-age.com)
 */

namespace Series\Api\Data;

interface SerieInterface
{
    const SERIES_ID = 'series_id';
    const NAME = 'name';
    const COLOR = 'color';

    /**
     * Get Series Id
     *
     * @return mixed
     */
    public function getSeriesId();

    /**
     * Set Series Id
     *
     * @param $seriesId
     * @return $this
     */
    public function setSeriesId($seriesId);

    /**
     * Get Name
     *
     * @return mixed
     */
    public function getName();

    /**
     * Set Name
     *
     * @param $name
     * @return $this
     */
    public function setName($name);

    /**
     * Get Color
     *
     * @return mixed
     */
    public function getColor();

    /**
     * Set Color
     *
     * @param $color
     * @return $this
     */
    public function setColor($color);

}
