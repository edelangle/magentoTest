<?php
/**
 * This file is part of Poe Customer
 *
 * @author JC Lecas <jclecas@clever-age.com> <@CleverAge>
 * @category Poe
 * @package Poe\Customer\Controller\Customer
 * @license CleverAge
 * @copyright Copyright (c) 2022 Clever Age (https://www.clever-age.com)
 */

namespace Series\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    /**
     * Page factory
     *
     * @var PageFactory
     */
    protected $pageFactory;

    /**
     * Index constructor.
     *
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        $this->pageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    /**
     * Execute
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $page = $this->pageFactory->create();
        $page->getConfig()->getTitle()->prepend(__('Series Index Page'));
        return $page;
    }
}
