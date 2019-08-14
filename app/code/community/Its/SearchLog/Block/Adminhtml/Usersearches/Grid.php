<?php
 
class Its_SearchLog_Block_Adminhtml_Usersearches_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('usersearches_Grid');
        $this->setDefaultSort('entity_id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
		$this->setUseAjax(true);
		
    }
 
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('searchlog/content')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }
 
    
    protected function _prepareColumns()
    {
       $this->addColumn('entity_id', array(
            'header'    => Mage::helper('searchlog')->__('ID'),
            'align'     =>'left !important',
		   'width'     => '10px',
            'index'     => 'query_id',
            'type'  => 'number',
        ));
 
        $this->addColumn('user_id', array(
          'header'    => Mage::helper('searchlog')->__('User ID'),
          'align'     =>'left',
          'index'     => 'user_id',
          'width'     => '50px',
		  'type'  => 'number',
        ));
 
          
        $this->addColumn('search_query', array(
            'header'    => Mage::helper('searchlog')->__('Search Query'),
            'width'     => '150px',
            'index'     => 'query_text',
			'type'  => 'text',
        ));
		$this->addColumn('items_found_per_search', array(
            'header'    => Mage::helper('searchlog')->__('Items found per search'),
            'width'     => '150px',
            'index'     => 'item_count_per_result',
			'type'  => 'number',
        ));
		$this->addColumn('searched_at', array(
            'header'    => Mage::helper('searchlog')->__('Searched at'),
            'width'     => '150px',
            'index'     => 'date_time',
			'type'  => 'datetime',
        ));
	
        return parent::_prepareColumns();
    }
	
	public function getGridUrl()
	{
return $this->getUrl('*/*/grid', array('_current' => true,));
	}
	
	public function getRowUrl($row)
    {
   
    }
}
