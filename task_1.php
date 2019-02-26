<?php
	/*
		* command line utility to sum zero to two numbers.
		* author: Brijesh Pandey
	*/

	/* 
		* calling method sum	
	*/
	sum($argv);

	// start: method sum

	function sum($argv){

		/* 
			* set the errorFlag variable for various cases
			* set initial value to zero
		*/
		$errorFlag = 0;

		// chek arguments set or not
		if(isset($argv))
		{
			// check for argument array length
			if(count($argv) > 3){
				// set errorFlag to 1
				$errorFlag = 1;
			} else{

				if(isset($argv[1])){

					// second argument should be sum after file name
					if($argv[1] == 'sum'){

						// initialize $sum to 0
						$sum = 0;

						// check third argument is set or not
						if(isset($argv[2])){

							// get the third argument from the command line
							$value = $argv[2];

							// convert third argument from string to an array
							$tempArray = explode(',',$value);

							// allow sum upto two numbers
							if(count($tempArray) <= 2){

								/*
									* call method checkAllValues	
									* to check all vaues in array should be positive number
								*/
								$checkResult = checkAllValues($tempArray);

								if($checkResult == 1){
									echo "\n"."Sum upto two positive numbers is possible, write  command as: calculator.php sum 1,2"."\n\n";
								} else {
									// calculate sum of all elememts of array
									$sum = array_sum($tempArray);
									echo "\n".$sum."\n\n";
								} 

							} else {
								echo "\n"."Sum upto two positive numbers is possible, write  command as: calculator.php sum 1,2"."\n\n";
							}
						} else {
							echo "\n".$sum."\n\n";
						}
					} else{
						$errorFlag = 1;
					} 
				} else {
					$errorFlag = 1;
				}
			} 
		} else{
				$errorFlag = 1;
		}

		if($errorFlag == 1){
			echo "\n"."Please supply required arguments arguments"."\n";
			echo "\n"."Sum upto two positive numbers is possible, write  command as: calculator.php sum 1,2"."\n\n";
		}
	}

	// end: method sum 



	/*
		* start: method checkAllValues
		* each argument value checked
		* for numeric
		* also for positive number
	*/

	function checkAllValues($tempArray)
	{
	    
	    $checkFlag = 0;
	    foreach($tempArray as $value){

	    	// check whether the value is numeric
	    	if(is_numeric($value)){
	    		// check whether the value is positive number
		    	if($value < 0){
		    		$checkFlag = 1;
		    		break;
		    	}
	    	} else {
	    		$checkFlag = 1;
	    		break;
	    	}
	    }
	    return $checkFlag;
	}

	// end: method checkAllValues 

?>