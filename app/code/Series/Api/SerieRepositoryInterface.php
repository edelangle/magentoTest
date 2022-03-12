<?php

namespace Series\Api;

use Magento\Framework\Api\SearchResultsInterface;
use Series\Api\Data\SerieInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\LocalizedException;

interface SerieRepositoryInterface
{
    /**
     * Delete Serie
     *
     * @param SerieInterface $serie
     * @return mixed
     * @throws LocalizedException
     */
    public function delete(SerieInterface $serie);

    /**
     * Delete Serie By Id
     *
     * @param  $id
     * @return mixed
     * @throws LocalizedException
     */
    public function deleteById($id);

    /**
     * Get Serie By Id
     *
     * @param  $id
     * @return SerieInterface
     * @throws LocalizedException
     */
    public function get($id);

    /**
     * Get Serie List
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return SearchResultsInterface
     * @throws LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * Save Serie
     *
     * @param SerieInterface $serie
     * @return SerieInterface
     * @throws LocalizedException
     */
    public function save(SerieInterface $serie);
}
