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
     * @return int
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    public function save(MovieInterface $movie): int
    {
        $this->_movieResource->save($movie);

        return $movie->getMovieId();
    }

    /**
     * @param MovieInterface $movie
     * @return bool
     * @throws \Exception
     */
    public function delete(MovieInterface $movie): bool
    {
        $this->_movieResource->delete($movie);

        return true;
    }

}