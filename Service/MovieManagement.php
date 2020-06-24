<?php
declare(strict_types=1);

namespace NicolasBlancoM\WatchingMovies\Service;

use NicolasBlancoM\WatchingMovies\Api\Data\MovieInterface;
use NicolasBlancoM\WatchingMovies\Api\MovieManagementInterface;
use NicolasBlancoM\WatchingMovies\Model\ResourceModel\Movie as MovieResource;

class MovieManagement implements MovieManagementInterface
{
    /**
     * @var MovieResource
     */
    private $_movieResource;

    public function __construct(MovieResource $movieResource)
    {
        $this->_movieResource = $movieResource;
    }

    /**
     * @param MovieInterface $movie
     * @return void
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    public function save(MovieInterface $movie)
    {
        $this->_movieResource->save($movie);
    }

    /**
     * @param MovieInterface $movie
     * @return void
     */
    public function delete(MovieInterface $movie)
    {
        $this->delete($movie);
    }

}