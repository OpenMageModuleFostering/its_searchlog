<?php


class Its_SearchLog_Adminhtml_SearchlogController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_title($this->__('Search Log'));
        $this->loadLayout();
        $this->_setActiveMenu('searchlog'); //The menu that is highlighted
       
	   $this->_addContent($this->getLayout()->createBlock('searchlog/adminhtml_usersearches'));
	 
        $this->renderLayout();
		return $this;
    }
	
	
  public function saveAction()
    {
        $this->loadLayout();
        $this->renderLayout();
		return $this;
    }
	
	  public function newAction()
    {
        $this->loadLayout();
        $this->renderLayout();
		return $this;
    }
    
	public function massDeleteAction()
    {
        $this->loadLayout();
        $this->renderLayout();
		return $this;
    }


   public function gridAction()
     {
        $this->loadLayout();
        $this->getResponse()->setBody(
               $this->getLayout()->createBlock('searchlog/adminhtml_usersearches_grid')->toHtml()
        );
     }
 
 protected function _isAllowed()
{
return Mage::getSingleton('admin/session')->isAllowed( 'admin/searchlog' );
}  
 
}