<?php

namespace Series\Api;

use Magento\Framework\Api\SearchResultsInterface;
use Series\Api\Data\VendorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\LocalizedException;

interface VendorRepositoryInterface
{
    /**
     * Delete Vendor
     *
     * @param VendorInterface $vendor
     * @return mixed
     * @throws LocalizedException
     */
    public function delete(VendorInterface $vendor);

    /**
     * Delete Vendor By Id
     *
     * @param  $id
     * @return mixed
     * @throws LocalizedException
     */
    public function deleteById($id);

    /**
     * Get Vendor By Id
     *
     * @param  $id
     * @return VendorInterface
     * @throws LocalizedException
     */
    public function get($id);

    /**
     * Get Vendor List
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return SearchResultsInterface
     * @throws LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * Save Vendor
     *
     * @param VendorInterface $vendor
     * @return VendorInterface
     * @throws LocalizedException
     */
    public function save(VendorInterface $vendor);
}
