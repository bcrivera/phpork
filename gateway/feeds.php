<?php
	
	include "../inc/functions.php"; 
	
	$db = new phpork_functions (); 
	

	if(isset($_GET['addFeeds'])){
		$fid = $_GET['selectFeeds']; 
		$fdate = $_GET['fdate']; 
		$ftime = $_GET['ftime']; 
		$selpig = $_GET['selpig']; 
		$proddate = $_GET['feedtypeDate']; 
		$qty = $_GET['feedQty'];

		$sparray = array();
		

		if (isset($_GET['pensel'])) {
			foreach ($_GET['pensel'] as $key) {
				$sparray = $db->ddl_perpen($key);
				
				
				
			}
			$fqty = $qty/sizeof($sparray);
			
			$feedqty = number_format($fqty, 2, '.', ',');
			foreach ($_GET['pensel'] as $key) {
				$sparray = $db->ddl_perpen($key);
				foreach ($sparray as $a ) {
					
					echo json_encode($db->addFeeds($fid,$fdate,$ftime,$selpig,$proddate,$feedqty)); 
				
				}
			}

		}
		if (isset($_GET['pigpen'])) {

			$pigsize = sizeof($_GET['pigpen']);
			$fqty = $qty/$pigsize;
			foreach($_GET['pigpen'] as $pid){
				echo json_encode($db->addFeeds($fid,$fdate,$ftime,$pid,$proddate,$fqty)); 					
			} 
		}
//localhost/phpork2/gateway/feeds.php?addFeeds=1&selectFeeds=2&fdate=2016-03-05&ftime=08:00:00&feedtypeDate=2016-03-05&feedQty=0.20&selpig=1
	
	}
	if(isset($_GET['addFeedName'])){
		$fname = $_GET['fname'];
		$ftype = $_GET['ftype'];
		echo json_encode($db->addFeedName($fname,$ftype)); 
		//localhost/phpork2/gateway/feeds.php?addFeedName=1&fname=feed&ftype=feedtype
	} 
	if(isset($_GET['getFeedsDetails'])){
		$feed = $_GET['feed']; 
		echo json_encode($db->getFeedsDetails($feed)); 
		//localhost/phpork2/gateway/feeds.php?getFeedsDetails=1&feed=1
	} 
	if(isset($_GET['getFeedTransDetails'])){
		$feed = $_GET['feed']; 
		echo json_encode($db->getFeedTransDetails($feed)); 
		//localhost/phpork2/gateway/feeds.php?getFeedTransDetails=1&feed=1
	} 
	if(isset($_GET['ddl_feedRecordEdit'])){
		$pid = $_GET['pig']; 
		echo json_encode($db->ddl_feedRecordEdit($pid)); 
		//localhost/phpork2/gateway/feeds.php?ddl_feedRecordEdit=1&pig=1
	} 
	if(isset($_GET['ddl_feedRecord'])){
		$pid = $_GET['pig']; 
		echo json_encode($db->ddl_feedRecord($pid)); 
		//localhost/phpork2/gateway/feeds.php?ddl_feedRecord=1&pig=1
	} 
?>