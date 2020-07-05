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
     * @param int $movieId
     * @return void
     */
    public function setMovieId(int $movieId);
    
    /**
     * @return string
     */
    public function getStatus(): string;

    /**
     * @param string $status
     * @return void
     */
    public function setStatus(string $status);

    /**
     * @return string
     */
    public function getLabel(): string;

    /**
     * @param string $label
     * @return void
     */
    public function setLabel(string $label);
}