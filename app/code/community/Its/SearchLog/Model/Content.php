<?php
 
class Its_SearchLog_Model_Content extends Mage_Core_Model_Abstract
{
     public function _construct()
    {
        parent::_construct();
        $this->_init('searchlog/content');
    }
}