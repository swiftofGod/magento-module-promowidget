<?php

class VS7_PromoWidget_Block_Bannerslist
    extends Mage_Core_Block_Template
    implements Mage_Widget_Block_Interface
{
    protected function _toHtml()
    {
        $banners = Mage::getModel('vs7_promowidget/banner')
            ->getCollection()
            ->addActiveRuleFilter()
            ->addFieldToFilter('image', array('neq' => 'NULL'))
            ->setOrder('position', 'desc');
        if ($banners->getSize() > 0) {
            $html = '<div class="vs7_promowidget-container">';
            $arrayA = array();
            $arrayB = array();
            foreach ($banners as $banner) {
                $imagePath = Mage::helper('vs7_promowidget')->getImagePath($banner->getImage());
                list($width, $height) = getimagesize($imagePath, $imgInfo);
                if (!empty($width) && !empty($height)) {
                    $ratio = $width / $height;
                    if ($ratio < 2) {
                        $arrayA[] = $banner;
                    } else {
                        $arrayB[] = $banner;
                    }
                }
            }

            $length = count($arrayA) + count($arrayB);
            for ($i = 1; $i <= $length; $i++) {
                if ($i % 3 == 0) {
                    if (count($arrayB) == 0) {
                        $banner = array_shift($arrayA);
                    } else {
                        $banner = array_shift($arrayB);
                    }
                } else {
                    if (count($arrayA) == 0) {
                        $banner = array_shift($arrayB);
                    } else {
                        $banner = array_shift($arrayA);
                    }
                }

                $html .= '<div class="vs7_promowidget-banner">';
                if ($banner->getUrlKey() != null) {
                    $html .= '<a href="' . $banner->getUrlKey() . '">';
                }
                $html .= '<img src="' . Mage::helper('vs7_promowidget')->getImageFullUrl($banner->getImage()) . '" alt="' . $banner->getName() . '" title="' . $banner->getName() . '"/>';
                if ($banner->getUrlKey() != null) {
                    $html .= '</a>';
                }
                $html .= '</div>';
            }

            $html .= '</div>';

            return $html;
        }
    }
}