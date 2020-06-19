<?php
namespace NicolasBlancoM\WatchingMovies\Api;

/**
 * @api
 */
interface MovieManagementInterface
{
    public function save();

    public function delete();
}