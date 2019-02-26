<?php
	/*
		* command line utility to add multiple numbers ignoring numbers above 1000.
		* author: Brijesh Pandey
	*/

	/* 
		* calling method add	
	*/
	add($argv);

	// start: method add

	function add($argv){

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
					if($argv[1] == 'add'){

						// initialize $add to 0
						$add = 0;

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
								echo "\n"."Write  command as: calculator.php add 10,20,1010,20......"."\n\n";
							} else {
								/*
									* calculate addition of all elememts 
									* which are less than or equal to 1000 of array
								*/
								foreach($tempArray as $val){
									if($val <= 1000)
										$add = $val + $add;
									continue;
								}
								echo "\n".$add."\n\n";
							}
						} else {
							echo "\n".$add."\n\n";
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
			echo "\n"."Write  command as: calculator.php add 10,20,1010,20......"."\n\n";
		}
	}

	// end: method add 



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