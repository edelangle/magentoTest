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

use Magento\Framework\Api\SearchResultsInterfaceFactory;
use Series\Api\SerieRepositoryInterface;
use Series\Api\Data\SerieInterface;
use Series\Api\Data\SerieInterfaceFactory;
use Series\Model\ResourceModel\Serie as SerieResource;
use Series\Model\ResourceModel\Serie\CollectionFactory as SerieCollectionFactory;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class SerieRepository implements SerieRepositoryInterface
{
    /**
     * @var SerieInterfaceFactory
     */
    private $serieFactory;

    /**
     * @var SerieResource
     */
    private $resource;

    /**
     * CollectionProcessorInterface object
     *
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var SerieCollectionFactory
     */
    private $collectionFactory;

    /**
     * @var SearchResultsInterfaceFactory
     */
    private $searchResultsFactory;

    /**
     * SerieRepository constructor.
     *
     * @param SerieInterfaceFactory $serieFactory
     * @param SerieResource $serieResource
     * @param CollectionProcessorInterface $collectionProcessor
     * @param SearchResultsInterfaceFactory $searchResultsFactory
     * @param SerieCollectionFactory $serieCollectionFactory
     */
    public function __construct(
        SerieInterface $serieFactory,
        SerieResource $serieResource,
        CollectionProcessorInterface $collectionProcessor,
        SearchResultsInterfaceFactory $searchResultsFactory,
        SerieCollectionFactory $serieCollectionFactory
    ) {
        $this->serieFactory = $serieFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->resource = $serieResource;
        $this->collectionProcessor = $collectionProcessor;
        $this->collectionFactory = $serieCollectionFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function save(SerieInterface $serie)
    {
        try {
            $this->resource->save($serie);
        } catch (\Exception $e) {
            throw new CouldNotSaveException(__('Could not save the Serie.'), $e);
        }
        return $serie;
    }

    /**
     * {@inheritdoc}
     */
    public function get($id)
    {
        $serie = $this->serieFactory->create();
        $this->resource->load($serie, $id);
        if (!$serie->getId()) {
            throw new NoSuchEntityException(__("No Serie found with this id: $id"));
        }
        return $serie;
    }

    /**
     * {@inheritdoc}
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $searchResults = $this->searchResultsFactory->create();
        $collection = $this->collectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);


        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(SerieInterface $serie)
    {
        try {
            $this->resource->delete($serie);
        } catch (\Exception $e) {
            throw new CouldNotDeleteException(__('Could not delete the Serie.'), $e);
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($id)
    {
        $serie = $this->get($id);
        $this->delete($serie);
    }
}
