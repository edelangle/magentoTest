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

use Series\Api\VendorRepositoryInterface;
use Series\Api\Data\VendorInterface;
use Series\Api\Data\VendorInterfaceFactory;
use Series\Api\Data\VendorSearchResultsInterfaceFactory;
use Series\Model\ResourceModel\Vendor as VendorResource;
use Series\Model\ResourceModel\Vendor\CollectionFactory as VendorCollectionFactory;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class VendorRepository implements VendorRepositoryInterface
{
    /**
     * @var VendorInterfaceFactory
     */
    private $vendorFactory;

    /**
     * @var VendorSearchResultsInterfaceFactory
     */
    private $searchResultsFactory;

    /**
     * @var VendorResource
     */
    private $resource;

    /**
     * CollectionProcessorInterface object
     *
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var VendorCollectionFactory
     */
    private $collectionFactory;

    /**
     * VendorRepository constructor.
     *
     * @param VendorInterfaceFactory $vendorFactory
     * @param VendorSearchResultsInterfaceFactory $vendorSearchResultsInterfaceFactory
     * @param VendorResource $vendorResource
     * @param CollectionProcessorInterface $collectionProcessor
     * @param VendorCollectionFactory $vendorCollectionFactory
     */
    public function __construct(
        VendorInterfaceFactory $vendorFactory,
        VendorSearchResultsInterfaceFactory $vendorSearchResultsInterfaceFactory,
        VendorResource $vendorResource,
        CollectionProcessorInterface $collectionProcessor,
        VendorCollectionFactory $vendorCollectionFactory
    ) {
        $this->vendorFactory = $vendorFactory;
        $this->searchResultsFactory = $vendorSearchResultsInterfaceFactory;
        $this->resource = $vendorResource;
        $this->collectionProcessor = $collectionProcessor;
        $this->collectionFactory = $vendorCollectionFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function save(VendorInterface $vendor)
    {
        try {
            $this->resource->save($vendor);
        } catch (\Exception $e) {
            throw new CouldNotSaveException(__('Could not save the Vendor.'), $e);
        }
        return $vendor;
    }

    /**
     * {@inheritdoc}
     */
    public function get($id)
    {
        $vendor = $this->vendorFactory->create();
        $this->resource->load($vendor, $id);
        if (!$vendor->getId()) {
            throw new NoSuchEntityException(__("No Vendor found with this id: $id"));
        }
        return $vendor;
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
    public function delete(VendorInterface $vendor)
    {
        try {
            $this->resource->delete($vendor);
        } catch (\Exception $e) {
            throw new CouldNotDeleteException(__('Could not delete the Vendor.'), $e);
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($id)
    {
        $vendor = $this->get($id);
        $this->delete($vendor);
    }
}
