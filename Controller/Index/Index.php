<?php

declare(strict_types=1);

namespace NicolasBlancoM\WatchingMovies\Controller\Index;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use NicolasBlancoM\WatchingMovies\Model\MovieFactory;
use NicolasBlancoM\WatchingMovies\Model\ResourceModel\Movie as MovieResource;
use NicolasBlancoM\WatchingMovies\Service\MovieManagement;
use NicolasBlancoM\WatchingMovies\Service\MovieRepository;

class Index extends Action
{
    /**
     * @var MovieFactory
     */
    private $movieFactory;

    /**
     * @var MovieResource
     */
    private $movieResource;

    /**
     * @var MovieRepository
     */
    private $_movieRepository;

    /**
     * @var MovieManagement
     */
    private $_movieManagement;

    /**
     * @var SearchCriteriaBuilder
     */
    private $_searchCriteriaBuilder;

    public function __construct(
        Context $context,
        MovieFactory $movieFactory,
        MovieResource $movieResource,
        MovieRepository $movieRepository,
        MovieManagement $movieManagement,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ){
        $this->movieFactory = $movieFactory;
        $this->movieResource = $movieResource;
        $this->_movieRepository = $movieRepository;
        $this->_movieManagement = $movieManagement;
        $this->_searchCriteriaBuilder = $searchCriteriaBuilder;

        parent::__construct($context);
    }

    public function execute()
    {
        // Test ORM
        /*$movie = $this->movieFactory->create();
        $movie->setData([
            'label' => 'Test Movie 1',
            'satus' => 'open',
            'customer_id' => 1,
        ]);
        $this->movieResource->save($movie);*/
        // END Test ORM

        // Test MovieRepository
        /*$movie = $this->_movieRepository->get(1);

        var_dump($movie->getData());*/
        // END Test MovieRepository

        // Test Repository service
        /*$searchCriteria = $this->_searchCriteriaBuilder->create();
        $movies = $this->_movieRepository->getList($searchCriteria)->getItems();
        var_dump($movies);*/
        // END Test Repository service

        // Test Management service
        /*$movie = $this->_movieRepository->get(1);
        $movie->setData('status', 'complete'); // change some data
        $this->_movieManagement->save($movie); // save it using management class

        // use Repository class to see results
        $searchCriteria = $this->_searchCriteriaBuilder->create();
        $movies = $this->_movieRepository->getList($searchCriteria)->getItems();
        var_dump($movies);*/
        // END Test Management service

        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
