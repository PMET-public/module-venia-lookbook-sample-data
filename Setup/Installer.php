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
     * @var \MagentoEse\VeniaLookBookSampleData\Model\Category
     */
    protected $categorySetup;

    /**
     * update class for products
     *
     * @var \MagentoEse\VeniaLookBookSampleData\Model\Product
     */
    protected $productSetup;

    /**
     * App State
     *
     * @var \Magento\Framework\App\State
     */
    protected $state;


    /**
     * @param \MagentoEse\VeniaLookBookSampleData\Model\Category $categorySetup
     * @param \MagentoEse\VeniaLookBookSampleData\Model\Product $productSetup
     * @param \Magento\Framework\App\State $state
     */


    public function __construct(
       \MagentoEse\VeniaLookBookSampleData\Model\Category $categorySetup,
       \MagentoEse\VeniaLookBookSampleData\Model\Product $productSetup,
        \Magento\Framework\App\State $state
    ) {
        $this->categorySetup = $categorySetup;
        $this->productSetup = $productSetup;

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
        $this->categorySetup->install(['MagentoEse_VeniaLookBookSampleData::fixtures/categories.csv']);
        //add image to cat
        //add lookbook info and image to products, assign to categories
        $this->productSetup->install(['MagentoEse_VeniaLookBookSampleData::fixtures/products.csv']);
        //assign priorities to category
        //TODO:where is the look book cat text coming from?
        //move STL attributeset to only venia attribute groups
        //add look book block to STL main category

    }
}