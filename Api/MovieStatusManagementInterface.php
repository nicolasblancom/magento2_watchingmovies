<?php

declare(strict_types=1);

namespace NicolasBlancoM\WatchingMovies\Api;

/**
 * @api
 */
interface MovieStatusManagementInterface
{
    /**
     * @param int $movieId
     * @param string $status
     * @return bool
     */
    public function change(int $movieId, string $status): bool;
}