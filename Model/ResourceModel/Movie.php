<?php
namespace NicolasBlancoM\WatchingMovies\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Movie extends AbstractDb
{

    protected function _construct()
    {
        $this->_init('nicolasblancom_watchingmovies_movie', 'movie_id');
    }
}