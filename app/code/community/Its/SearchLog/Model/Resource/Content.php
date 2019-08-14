<?php
 
class Its_SearchLog_Model_Resource_Content extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('searchlog/content', 'entity_id');
    }
}