<?php
namespace NicolasBlancoM\WatchingMovies\Service;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use NicolasBlancoM\WatchingMovies\Api\Data\MovieSearchResultInterface;
use NicolasBlancoM\WatchingMovies\Api\Data\MovieSearchResultInterfaceFactory;
use NicolasBlancoM\WatchingMovies\Api\MovieRepositoryInterface;
use NicolasBlancoM\WatchingMovies\Model\MovieFactory;
use NicolasBlancoM\WatchingMovies\Model\ResourceModel\Movie as MovieResource;

class MovieRepository implements MovieRepositoryInterface
{
    /**
     * @var MovieResource
     */
    private $_movieResource;

    /**
     * @var MovieFactory
     */
    private $_movieFactory;

    /**
     * @var MovieSearchResultInterfaceFactory
     */
    private $_searchResultFactory;

    /**
     * @var CollectionProcessorInterface
     */
    private $_collecctionProcessor;

    public function __construct(
        MovieResource $movieResource,
        MovieFactory $movieFactory,
        MovieSearchResultInterfaceFactory $searchResultInterfaceFactory,
        CollectionProcessorInterface $collectionProcessor
    ){
        $this->_movieResource = $movieResource;
        $this->_movieFactory = $movieFactory;
        $this->_searchResultFactory = $searchResultInterfaceFactory;
        $this->_collecctionProcessor = $collectionProcessor;
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return MovieSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): MovieSearchResultInterface
    {
        $searchResult = $this->_searchResultFactory->create();
        $searchResult->setSearchCriteria($searchCriteria);

        $this->_collecctionProcessor->process($searchCriteria, $searchResult);

        return $searchResult;
    }

    public function get(int $movieId)
    {
        $movie = $this->_movieFactory->create();

        $this->_movieResource->load($movie, $movieId);

        return $movie;
    }

}