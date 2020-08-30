<?php

class VS7_PromoWidget_Model_Resource_Banner extends Mage_Core_Model_Resource_Db_Abstract
{
    public function _construct()
    {
        $this->_init('vs7_promowidget/banner', 'entity_id');
    }
}