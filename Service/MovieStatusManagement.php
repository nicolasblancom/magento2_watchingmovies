<?php

declare(strict_types=1);

namespace NicolasBlancoM\WatchingMovies\Service;

use NicolasBlancoM\WatchingMovies\Api\MovieManagementInterface;
use NicolasBlancoM\WatchingMovies\Api\MovieRepositoryInterface;
use NicolasBlancoM\WatchingMovies\Api\MovieStatusManagementInterface;
use NicolasBlancoM\WatchingMovies\Model\Movie;

class MovieStatusManagement implements MovieStatusManagementInterface
{
    /**
     * @var MovieRepositoryInterface;
     */
    private $_repository;

    /**
     * @var MovieManagementInterface
     */
    private $_management;

    /**
     * MovieStatusManagement constructor.
     * @param MovieRepositoryInterface $movieRepository
     * @param MovieManagementInterface $movieManagement
     */
    public function __construct(
        MovieRepositoryInterface $movieRepository,
        MovieManagementInterface $movieManagement
    ){
        $this->_repository = $movieRepository;
        $this->_management = $movieManagement;
    }

    /**
     * @param int $movieId
     * @param string $status
     * @return bool
     */
    public function change(int $movieId, string $status): bool
    {
        if (!in_array($status, ['open', 'complete'])) return false;

        $movie = $this->_repository->get($movieId);

        $movie->setData(Movie::STATUS, $status);

        $this->_management->save($movie);

        return true;
    }
}