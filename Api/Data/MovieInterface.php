<?php
declare(strict_types=1);
namespace NicolasBlancoM\WatchingMovies\Api\Data;

/**
 * @api
 */
interface MovieInterface
{
    /**
     * @return int
     */
    public function getMovieId(): int;

    /**
     * @return string
     */
    public function getStatus(): string;

    /**
     * @return string
     */
    public function getLabel(): string;
}