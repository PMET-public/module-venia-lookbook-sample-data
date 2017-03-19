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
        /*Add shop the look cat and subcats
        Add image to categories
        set to static block only and set landing page*/
        //TODO:Add category images to pub/media/catalog/category
        //TODO:Add look book block id to categories.csv
        //TODO:Add CMS module to module sequence
        $this->categorySetup->install(['MagentoEse_VeniaLookBookSampleData::fixtures/categories.csv']);
        //add lookbook info and image to products, assign to categories, set priority
        $this->productSetup->install(['MagentoEse_VeniaLookBookSampleData::fixtures/products.csv']);
        //TODO:where is the look book cat text coming from?
        //TODO:move STL attributeset to only venia attribute groups

    }
}