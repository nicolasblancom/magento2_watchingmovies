<?php
namespace NicolasBlancoM\WatchingMovies\Model;

use Magento\Framework\Model\AbstractModel;
use NicolasBlancoM\WatchingMovies\Api\Data\MovieInterface;
use NicolasBlancoM\WatchingMovies\Model\ResourceModel\Movie as MovieResource;

class Movie extends AbstractModel implements MovieInterface
{
    const MOVIE_ID = 'movie_id';
    const STATUS = 'status';
    const LABEL = 'label';

    public function _construct()
    {
        $this->_init(MovieResource::class);
    }

    /**
     * @return int
     */
    public function getMovieId(): int
    {
        return $this->getData(self::MOVIE_ID);
    }

    /**
     * @param int $movieId
     */
    public function setMovieId(int $movieId)
    {
        $this->setData(self::MOVIE_ID, $movieId);
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->getData(self::STATUS);
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status)
    {
        $this->setData(self::STATUS, $status);
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->getData(self::LABEL);
    }

    /**
     * @param string $label
     */
    public function setLabel(string $label)
    {
        $this->setData(self::LABEL, $label);
    }
}