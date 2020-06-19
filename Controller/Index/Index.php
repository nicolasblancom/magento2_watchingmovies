<?php

declare(strict_types=1);

namespace NicolasBlancoM\WatchingMovies\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use NicolasBlancoM\WatchingMovies\Model\MovieFactory;
use NicolasBlancoM\WatchingMovies\Model\ResourceModel\Movie as MovieResource;
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

    private $_movieRepository;

    public function __construct(
        Context $context,
        MovieFactory $movieFactory,
        MovieResource $movieResource,
        MovieRepository $movieRepository
    ){
        $this->movieFactory = $movieFactory;
        $this->movieResource = $movieResource;
        $this->_movieRepository = $movieRepository;

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

        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
