<?php
namespace NicolasBlancoM\WatchingMovies\Service;

use NicolasBlancoM\WatchingMovies\Api\MovieRepositoryInterface;
use NicolasBlancoM\WatchingMovies\Model\MovieFactory;
use NicolasBlancoM\WatchingMovies\Model\ResourceModel\Movie as MovieResource;

class MovieRepository implements MovieRepositoryInterface
{
    private $_movieResource;

    private $_movieFactory;

    public function __construct(
        MovieResource $movieResource,
        MovieFactory $movieFactory
    ){
        $this->_movieResource = $movieResource;
        $this->_movieFactory = $movieFactory;
    }

    public function getList()
    {
        // TODO: Implement getList() method.
    }

    public function get($movieId)
    {
        $movie = $this->_movieFactory->create();

        $this->_movieResource->load($movie, $movieId);

        return $movie;
    }

}