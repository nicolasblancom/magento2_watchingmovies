<?php
namespace NicolasBlancoM\WatchingMovies\Model\ResourceModel\Movie;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use NicolasBlancoM\WatchingMovies\Api\Data\MovieSearchResultInterface;
use NicolasBlancoM\WatchingMovies\Model\Movie;
use NicolasBlancoM\WatchingMovies\Model\ResourceModel\Movie as MovieResource;

class Collection extends AbstractCollection implements MovieSearchResultInterface
{

    /**
     * @var SearchCriteriaInterface
     */
    private $_searchCriteria;

    public function _construct()
    {
        $this->_init(Movie::class, MovieResource::class);
    }

    /**
     * @param array|null $items
     * @return $this
     * @throws \Exception
     */
    public function setItems(array $items)
    {
        if (!$items){
            return this;
        }

        foreach($items as $item){
            $this->addItem($item);
        }

        return $this;
    }

    /**
     * Get search criteria
     *
     * @return SearchCriteriaInterface
     */
    public function getSearchCriteria()
    {
        return $this->_searchCriteria;
    }

    /**
     * Set search criteria
     *
     * @param SearchCriteriaInterface|null $searchCriteria
     * @return Collection
     * @SuppressWarnings(PHPMD. UnusedFormalParameter)
     */
    public function setSearchCriteria(SearchCriteriaInterface $searchCriteria = null)
    {
        $this->_searchCriteria = $searchCriteria;

        return $this;
    }

    /**
     * Get total count
     *
     * @return int
     */
    public function getTotalCount()
    {
        return $this->getSize();
    }

    /**
     * @param int $totalCount
     * @return $this
     * @SuppressWarnings(PHPMD. UnusedFormalParameter)
     */
    public function setTotalCount($totalCount)
    {
        return $this;
    }
}