<?php
namespace NicolasBlancoM\WatchingMovies\Model;

use Magento\Framework\Model\AbstractModel;
use NicolasBlancoM\WatchingMovies\Model\ResourceModel\Movie as MovieResource;

class Movie extends AbstractModel
{

    public function _construct()
    {
        $this->_init(MovieResource::class);
    }
}