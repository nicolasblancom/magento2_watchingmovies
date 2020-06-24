<?php
declare(strict_types=1);

namespace NicolasBlancoM\WatchingMovies\Service;

use Magento\Framework\Api\SearchCriteriaBuilder;
use NicolasBlancoM\WatchingMovies\Api\CustomerMovieListInterface;

class CustomerMovieList implements CustomerMovieListInterface
{
    /**
     * @var MovieRepository
     */
    private $_movieRepository;

    /**
     * @var SearchCriteriaBuilder
     */
    private $_searchCriteriaBuilder;

    /**
     * CustomerMovieList constructor.
     * @param MovieRepository $movieRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(
        MovieRepository $movieRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ){
        $this->_movieRepository = $movieRepository;
        $this->_searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * @return \NicolasBlancoM\WatchingMovies\Api\Data\MovieInterface[]
     */
    public function getList()
    {
        $searchCriteria = $this->_searchCriteriaBuilder->create();

        $movies = $this->_movieRepository->getList($searchCriteria)->getItems();

        return $movies;
    }
}