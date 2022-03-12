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

namespace Series\Model;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Series\Api\SerieManagementInterface;
use Series\Api\SerieRepositoryInterface;
use Series\Api\Data\SerieInterface;

class SerieManagement implements SerieManagementInterface
{
    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteria;

    /**
     * @var SerieRepositoryInterface
     */
    private $serieRepository;

    /**
     * @var SerieInterfaceFactory
     */
    protected $serieFactory;

    /**
     * SerieManagement constructor.
     *
     * @param SearchCriteriaBuilder $searchCriteria
     * @param SerieRepositoryInterface $serieRepository
     * @param SerieInterfaceFactory $serieInterfaceFactory
     */
    public function __construct(
        SearchCriteriaBuilder $searchCriteria,
        SerieRepositoryInterface $serieRepository,
        SerieInterface $serieInterface
    ) {
        $this->searchCriteria = $searchCriteria;
        $this->serieRepository = $serieRepository;
        $this->serieFactory = $serieInterface;
    }
}

