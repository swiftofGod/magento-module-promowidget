<?php

class VS7_PromoWidget_Block_Adminhtml_Promo_Quote_Edit_Tab_Widgetbanner
    extends Mage_Adminhtml_Block_Widget_Form
    implements Mage_Adminhtml_Block_Widget_Tab_Interface
{
    public function getTabLabel()
    {
        return Mage::helper('vs7_promowidget')->__('Widget Banner');
    }

    public function getTabTitle()
    {
        return Mage::helper('vs7_promowidget')->__('Widget Banner');
    }

    public function canShowTab()
    {
        return true;
    }

    public function isHidden()
    {
        return false;
    }

    protected function _prepareForm()
    {
        $rule = Mage::registry('current_promo_quote_rule');
        $model = Mage::getModel('vs7_promowidget/banner')->load($rule->getId(), 'rule_id');

        $form = new Varien_Data_Form();
        $form->setHtmlIdPrefix('vs7_promowidget_');
        $form->setFieldNameSuffix('vs7_promowidget');
        $this->setForm($form);

        $fieldset = $form->addFieldset('fieldset',
            array('legend' => Mage::helper('vs7_promowidget')->__('Widget Banner'))
        );

        $fieldset->addField('name', 'text', array(
            'name' => 'name',
            'label' => Mage::helper('vs7_promowidget')->__('Banner Name'),
            'title' => Mage::helper('vs7_promowidget')->__('Banner Name'),
            'required' => false,
        ));

        $fieldset->addField('url_key', 'text', array(
            'name' => 'url_key',
            'label' => Mage::helper('vs7_promowidget')->__('Banner URL'),
            'title' => Mage::helper('vs7_promowidget')->__('Banner URL'),
            'required' => false,
        ));

        $fieldset->addField('text', 'textarea', array(
            'name' => 'text',
            'label' => Mage::helper('vs7_promowidget')->__('Banner Description'),
            'title' => Mage::helper('vs7_promowidget')->__('Banner Description'),
            'style' => 'height: 100px;',
        ));

        $fieldset->addField('image', 'image', array(
            'label' => Mage::helper('vs7_promowidget')->__('Banner Image'),
            'required' => false,
            'name' => 'vs7_promowidget_image',
        ));

        $fieldset->addField('position', 'text', array(
            'name' => 'position',
            'label' => Mage::helper('vs7_promowidget')->__('Banner Position'),
            'title' => Mage::helper('vs7_promowidget')->__('Banner Position'),
        ));

        $form->setValues(
            array(
                'name' => $model->getName(),
                'url_key' => $model->getUrlKey(),
                'text' => $model->getText(),
                'position' => $model->getPosition(),
            )
        );

        if ($model->getImage() != null) {
            $form->getElement('image')->setValue(Mage::helper('vs7_promowidget')->getImageMediaPath($model->getImage()));
        }

        $this->setForm($form);

        return parent::_prepareForm();
    }
}