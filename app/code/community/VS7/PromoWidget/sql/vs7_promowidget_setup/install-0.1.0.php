<?php
$this->startSetup();

$this->getConnection()->dropTable($this->getTable('vs7_promowidget/banner'));
$table = $this->getConnection()
    ->newTable($this->getTable('vs7_promowidget/banner'))
    ->addColumn('entity_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
    ), 'ID')
    ->addColumn('rule_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned'  => true,
        'nullable'  => false,
    ), 'ID')
    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        'nullable'  => false,
    ), 'Name')
    ->addColumn('url_key', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(),
        'URL Key'
    )
    ->addColumn('text', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(),
        'Text'
    )
    ->addColumn('image', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(),
        'Image'
    )
    ->addColumn('position', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array('nullable'  => false, 'default'   => '0',),
        'Position'
    )
    ->addColumn('updated_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(),
        'Banner Modification Time'
    )
    ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(),
        'Banner Creation Time'
    )
    ->addForeignKey(
        $this->getFkName(
            'vs7_promowidget/banner',
            'rule_id',
            'salesrule/rule',
            'rule_id'
        ),
        'rule_id',
        $this->getTable('salesrule/rule'),
        'rule_id',
        Varien_Db_Ddl_Table::ACTION_CASCADE,
        Varien_Db_Ddl_Table::ACTION_CASCADE
    )
    ->setComment('Banner Table');

$this->getConnection()->createTable($table);

$this->endSetup();