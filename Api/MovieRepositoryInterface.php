<?php
namespace NicolasBlancoM\WatchingMovies\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use NicolasBlancoM\WatchingMovies\Api\Data\MovieSearchResultInterface;

/**
 * @api
 */
interface MovieRepositoryInterface
{
    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \NicolasBlancoM\WatchingMovies\Api\Data\MovieSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): MovieSearchResultInterface;

    public function get(int $movieId);
}