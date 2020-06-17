<?php

declare(strict_types=1);

namespace NicolasBlancoM\WatchingMovies\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use NicolasBlancoM\WatchingMovies\Model\MovieFactory;
use NicolasBlancoM\WatchingMovies\Model\ResourceModel\Movie as MovieResource;

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

    public function __construct(
        Context $context,
        MovieFactory $movieFactory,
        MovieResource $movieResource
    ){
        $this->movieFactory = $movieFactory;
        $this->movieResource = $movieResource;

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

        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
