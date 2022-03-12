<?php
namespace Correction\TP7\Plugin\Customer;

use Correction\TP7\Observer\AddTrigramDataObserver;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Customer\Api\Data\CustomerInterface as CustomerData;
use Magento\Customer\Model\Session;
use Psr\Log\LoggerInterface;

class LogBeforeSessionReinit
{
    /** @var LoggerInterface */
    protected $logger;


    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepository;

    /**
     * LogBeforeSessionReinit constructor.
     *
     * @param LoggerInterface $logger
     */
    public function __construct(
        CustomerRepositoryInterface $customerRepository,
        LoggerInterface $logger
    ) {
        $this->logger = $logger;
        $this->customerRepository = $customerRepository;
    }

    public function afterSetCustomerDataAsLoggedIn(
        Session $subject,
        $result
    ) {
        $this->logger->critical(
            sprintf(
                'Session re-init for customer [%s]',
                $subject->getCustomer()->getData(AddTrigramDataObserver::TRIGRAM)
            )
        );
    }
}
