<?php

namespace Magnat\RouterToLog;

use Psr\Log\LoggerInterface;
use Magento\Framework\App\FrontController;
use Magento\Framework\App\RouterListInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\App\ObjectManager;

class NewFrontController extends FrontController
{
    /**
     * @var RouterListInterface
     */
    protected $_routerList;

    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(
        RouterListInterface $routerList,
        ResponseInterface $response,
        ?LoggerInterface $logger = null
    ) {
        $this->logger = $logger
        ?? ObjectManager::getInstance()->get(LoggerInterface::class);

        FrontController::__construct(
            $routerList,
            $response,
            $logger
        );
    }

    public function dispatch(\Magento\Framework\App\RequestInterface $request)
    {
        foreach ($this->_routerList as $router)
        {
            $this->logger->notice(get_class($router));
        }
        return FrontController::dispatch($request);
    }
}