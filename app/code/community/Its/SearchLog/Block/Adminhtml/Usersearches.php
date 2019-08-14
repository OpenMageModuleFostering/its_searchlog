<?php
 
class Its_SearchLog_Block_Adminhtml_Usersearches extends Mage_Adminhtml_Block_Widget_Grid_Container
{
//protected $_addButtonLabel = 'Add New Example';
    public function __construct()
    { 
	$this->_headerText = Mage::helper('searchlog')->__('List of Search Queries');
       $this->_blockGroup = 'searchlog'; 
	   $this->_controller = 'adminhtml_usersearches';
        parent::__construct();
       
    }
	protected function _prepareLayout()
   {
      $this->_removeButton ('add');
       return parent::_prepareLayout();
  }
	
}