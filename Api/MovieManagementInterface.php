<?php
namespace NicolasBlancoM\WatchingMovies\Api;

use NicolasBlancoM\WatchingMovies\Api\Data\MovieInterface;

/**
 * @api
 */
interface MovieManagementInterface
{
    /**
     * @param \NicolasBlancoM\WatchingMovies\Api\Data\MovieInterface $movie
     * @return bool
     */
    public function save(MovieInterface $movie);

    /**
     * @param \NicolasBlancoM\WatchingMovies\Api\Data\MovieInterface $movie
     * @return bool
     */
    public function delete(MovieInterface $movie);
}