<?php
namespace NicolasBlancoM\WatchingMovies\Model\ResourceModel\Movie;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use NicolasBlancoM\WatchingMovies\Model\Movie;
use NicolasBlancoM\WatchingMovies\Model\ResourceModel\Movie as MovieResource;

class Collection extends AbstractCollection
{

    public function _construct()
    {
        $this->_init(Movie::class, MovieResource::class);
    }
}