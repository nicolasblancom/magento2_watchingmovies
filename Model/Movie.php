<?php
namespace NicolasBlancoM\WatchingMovies\Model;

use Magento\Framework\Model\AbstractModel;
use NicolasBlancoM\WatchingMovies\Api\Data\MovieInterface;
use NicolasBlancoM\WatchingMovies\Model\ResourceModel\Movie as MovieResource;

class Movie extends AbstractModel implements MovieInterface
{

    public function _construct()
    {
        $this->_init(MovieResource::class);
    }
}