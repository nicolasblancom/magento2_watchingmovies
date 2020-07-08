<?php

declare(strict_types=1);

namespace NicolasBlancoM\WatchingMovies\Api;

use NicolasBlancoM\WatchingMovies\Api\Data\MovieInterface;

/**
 * @api
 */
interface MovieManagementInterface
{
    /**
     * @param \NicolasBlancoM\WatchingMovies\Api\Data\MovieInterface $movie
     * @return int
     */
    public function save(MovieInterface $movie): int;

    /**
     * @param \NicolasBlancoM\WatchingMovies\Api\Data\MovieInterface $movie
     * @return bool
     */
    public function delete(MovieInterface $movie): bool;
}