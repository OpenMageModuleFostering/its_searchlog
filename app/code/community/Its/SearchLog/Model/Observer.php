<?php

class Its_SearchLog_Model_Observer {
    //$observer contains data passed from when the event was triggered.
    public function send_search_details($observer) {
	
	
	// Check to see if the user is logged in
	if (Mage::getSingleton('customer/session')->isLoggedIn()) {

    // Load the customer's id to later be added to the database.
    $customer = Mage::getSingleton('customer/session')->getCustomer()->getData("entity_id");
	// Filter all the main details we need from $observer.
	$query = $observer->getEvent()->getDataObject();
	/* This pull the date and time from the query. The date and time
	from this event is a bit bizarre. If you search for something that you haven't
	searched for before, then it will give you the correct time, but if you use a 
	search term that you have used before it uses the time from the last search and adds a random amount of seconds on to the time. The only reason this time is being used is to filter out the other event that gets fired.
	*/
	$date_time = $query->getData("updated_at");
	// This is the text that the user is searching for.
	$query_string =$query->getData("query_text");
	// Start of the filtering. As 2 events get fired one event usually doesn't contain the query term and at times it doesn't contain the date_time.
	if (!empty($query_string) and (!empty($date_time))){
	// Get the number of products the search has found.
	$results_count =$query->getData("num_results");
	// This date is what will be saved into the database. As it is the current timestamp.
	$date = date('Y-m-d H:i:s');
	// Created an array to put all name->values into.
	$data = array('query_text'=>$query_string,
				  'user_id'=>$customer,
				  'item_count_per_result'=>$results_count,
				  'date_time'=>$date);
	// Below is the model we are using to access the corresponding mysql table to put the data into.			  
		$model = Mage::getModel('searchlog/content')->setData($data);
	//Its the below code that eventually saves the data to the database and if there are any problems it will throw an error.
	try {
         $model->save();
      
    } catch (Exception $e){
     echo $e->getMessage();  
}
}

    }

}
}