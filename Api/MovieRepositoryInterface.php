<?php
namespace NicolasBlancoM\WatchingMovies\Api;

/**
 * @api
 */
interface MovieRepositoryInterface
{
    public function getList();

    public function get($movieId);
}