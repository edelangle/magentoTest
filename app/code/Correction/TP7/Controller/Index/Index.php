<?php
namespace Correction\TP7\Controller\Index;

use Correction\TP7\Plugin\Customer\EnrichRandomAroundLoad;
use Magento\Customer\Model\CustomerFactory;
use Magento\Customer\Model\Customer as CustomerModel;
use Magento\Customer\Model\ResourceModel\Customer as CustomerResourceModel;
use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\App\Action\Context;

class Index extends Action
{
    /** @var CustomerFactory */
    protected $customerFactory;

    /** @var CustomerResourceModel */
    protected $customerResourceModel;

    public function __construct(
        CustomerFactory $customerFactory,
        CustomerResourceModel $customerResourceModel,
        Context $context
    ) {
        $this->customerFactory = $customerFactory;
        $this->customerResourceModel = $customerResourceModel;

        parent::__construct($context);
    }
    /**
     * @return ResultInterface
     */
    public function execute()
    {
        $data = [];


        //en fait j'arrive pas a chopper l'id du customer loggé
        $id = 4;//(int)$this->getRequest()->getParam('id');

        //enquete de pourquoi sa marche pas
        $test = $this->getRequest();
       // dd($test);

        if ($id != 0) {
            /** @var CustomerModel $customer */
            $customer = $this->customerFactory->create();
            if (($random = $this->getRequest()->getParam(EnrichRandomAroundLoad::RANDOM)) === 'true') {
                $customer->setData(EnrichRandomAroundLoad::RANDOM, true);
            }
            $this->customerResourceModel->load($customer, $id);
            if ($random || $customer->getId()) {
                $data = $customer->getData();
            } else {
                $data[] = [
                    'info' => sprintf('Model [%s] not found with id [%d]', $customer->getResourceName(), $id)
                ];
            }
        } else {
            //je suis dans ce cas
            dd($data);
            $data[] = [
                'error' => sprintf('Require parameter [%s] integer > 0', 'id')
            ];
        }
//dd($this->resultFactory->create(ResultFactory::TYPE_JSON));
        return $this->resultFactory->create(ResultFactory::TYPE_JSON)->setData($data);
    }
}
