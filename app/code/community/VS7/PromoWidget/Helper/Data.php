<?php

class VS7_PromoWidget_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function getImageMediaPath($imageFilename = null)
    {
        return 'vs7_promowidget' . DS . $imageFilename;
    }

    public function getImagePath($imageFilename = null)
    {
        return Mage::getBaseDir('media') . DS . $this->getImageMediaPath($imageFilename);
    }

    public function getImageFullUrl($imageFilename = null)
    {
        return Mage::getBaseUrl('media') . $this->getImageMediaPath($imageFilename);
    }
}