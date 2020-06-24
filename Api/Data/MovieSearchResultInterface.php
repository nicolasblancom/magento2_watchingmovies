<?php
declare(strict_types=1);
namespace NicolasBlancoM\WatchingMovies\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * @api
 */
interface MovieSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return \NicolasBlancoM\WatchingMovies\Api\Data\MovieInterface[]
     */
    public function getItems();

    /**
     * @param \NicolasBlancoM\WatchingMovies\Api\Data\MovieInterface[] $items
     * @return \NicolasBlancoM\WatchingMovies\Api\Data\MovieSearchResultInterface
     */
    public function setItems(array $items);
}