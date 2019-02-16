<?php
  //
  // appstore_sales.php
  // a script to sum up the sales
  //
  //
  // usage: php appstore_sales.php {path to }
  //    (you must prepare the payment files before running this script
  //

$item_prefix = array(
"Replace with",
"your product ids"
);

$dir = $argv[1];

$dir_info = preg_grep('/^\.+$/',scandir($dir),PREG_GREP_INVERT);

foreach($dir_info as $report_file){
	$ext = pathinfo($report_file, PATHINFO_EXTENSION);
// 	print $ext;
	if (strcmp($report_file, ".DS_Store")==0 || $ext != "txt") continue;
	
	print $report_file . "\t";

	$lines = file($dir . "/" . $report_file);

	$total = 0;

	$print_period = true;
	$skipfirstline = true;
	
	foreach($lines as $line){
//		print $line;
		if($skipfirstline){
			$skipfirstline = false;
			continue;
		}
		
		$columns = explode("\t", $line);
		
		if(count($columns) < 3) continue;
		
		if($print_period){
			$sdate = $columns[0];
			$edate = $columns[1];
			print "$sdate - $edate\n";
			$print_period = false;
		}
		
		$product_id = trim($columns[4]);
		//		echo $product_id."\n";

		for($i=0; $i<count($item_prefix); $i++) {
//			if (strcmp($product_id, $item_prefix[$i]) == 0){
			if (strstr($product_id, $item_prefix[$i])){
				$quantity = $columns[5];
				$partner_share = $columns[6];
				$currency = $columns[8];
				$country = $columns[17];
				
				print "\t" . $product_id . ": " . $quantity . " x " . $partner_share . " = " . $quantity*$partner_share . " " . $currency . " ($country)" . "\n";
				$total += $quantity * $partner_share;
				
			}
		}
	}
	
	if($total > 0){
		print "Total ("  . $currency . "):\t" . $total . "\n\n";
	}else{
		print "\tNo sales\n\n";
	}
}

?>
