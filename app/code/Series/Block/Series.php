<?php

namespace Series\Block;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\View\Element\Template;
use Series\Api\Data\SerieInterface;
use Series\Api\SerieRepositoryInterface;

class Series extends Template
{

    /**
     * @var SerieRepositoryInterface
     */
    private $serieRepository;

    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    public function __construct(
        SearchCriteriaBuilder $searchCriteriaBuilder,
        SerieRepositoryInterface $serieRepository,
        Template\Context $context,
        array $data = []
    ) {
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->serieRepository = $serieRepository;
        parent::__construct($context, $data);
    }

    /**
     * @return SerieInterface[]
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getSeries()
    {
        $searchCriteria = $this->searchCriteriaBuilder->create();
        $series = $this->serieRepository->getList($searchCriteria);
        return $series->getItems();
    }

    public function show($id)
    {
       
    }

    
    public function delete($id)
    {
       
    }

}
