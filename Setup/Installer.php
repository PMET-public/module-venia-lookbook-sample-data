<?php
/**
 * Copyright © 2017 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace MagentoEse\VeniaLookBookSampleData\Setup;

use Magento\Framework\Setup;

class Installer implements Setup\SampleData\InstallerInterface
{
    /**
     * Setup class for category
     *
     * @var \MagentoEse\VeniaCatalogSampleData\Model\Category
     */
    protected $categorySetup;



    /**
     * App State
     *
     * @var \Magento\Framework\App\State
     */
    protected $state;


    /**
     * @param \MagentoEse\VeniaCatalogSampleData\Model\Category $categorySetup
     * @param \Magento\Framework\App\State $state
     */


    public function __construct(
       // \MagentoEse\VeniaCatalogSampleData\Model\Category $categorySetup,
        \Magento\Framework\App\State $state
    ) {
        //$this->categorySetup = $categorySetup;

        try{
            $state->setAreaCode('adminhtml');
        }
        catch(\Magento\Framework\Exception\LocalizedException $e){
            // left empty
        }

    }

    /**
     * {@inheritdoc}
     */
    public function install()
    {
        //add shop the look cat and subcats
        //add image to cat
        //add lookbook info to products
        //add products to lookbook collections
        //move STL attributeset to only venia attribute groups

    }
}