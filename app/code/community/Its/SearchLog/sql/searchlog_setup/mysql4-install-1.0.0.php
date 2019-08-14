<?php



$installer = $this;
 
$installer->startSetup();
 
$installer->run("
 
 DROP TABLE IF EXISTS {$this->getTable('its_searchlog')};
CREATE TABLE {$this->getTable('its_searchlog')} (
  `query_id` int(11) unsigned NOT NULL auto_increment,
  `query_text` varchar(255) NOT NULL default '',
  `user_id` varchar(255) NOT NULL default '',
  `item_count_per_result` varchar(255) NOT NULL default '',
  `date_time` varchar(255) NOT NULL default '',
  PRIMARY KEY (`query_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 
    ");
 
$installer->endSetup();