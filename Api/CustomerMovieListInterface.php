<?php
namespace NicolasBlancoM\WatchingMovies\Api;

use NicolasBlancoM\WatchingMovies\Api\Data\MovieInterface;

/**
 * @api
 */
interface CustomerMovieListInterface
{
    /**
     * @return \NicolasBlancoM\WatchingMovies\Api\Data\MovieInterface
     */
    public function getList();
}