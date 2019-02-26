<?php
	/*
		* command line utility making multiply functionality: php calculator.php multiply 2,3
		* author: Brijesh Pandey
	*/

	/* 
		* Calling method multiply	
	*/
	multiply($argv);

	// start: method multiply

	function multiply($argv){

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

					// second argument should be multiply after file name
					if($argv[1] == 'multiply'){

						// initialize $sum to 0
						$multiply = 1;

						// check third argument is set or not
						if(isset($argv[2])){

							// get the third argument from the command line
							$value = $argv[2];

							// convert third argument from string to an array
							$tempArray = explode(',',$value);

							/*
								* call method checkAllValues	
								* to check all vaues in array should be positive number
							*/
							$checkResult = checkAllValues($tempArray);

							if($checkResult == 1){
								echo "\n"."Write  command as: calculator.php multiply 2,34,5....."."\n\n";
							} else {
								// calculate multiplication of all elememts of array
								foreach($tempArray as $value){
									$multiply = $multiply * $value;
								}
								
								echo "\n".$multiply."\n\n";
							} 
						} else {
							echo "\n".$multiply."\n\n";
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
			echo "\n"."Please write  command as: calculator.php multiply 2,3,4,5...."."\n\n";
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