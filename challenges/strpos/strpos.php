<?php


function my_strpos($haystack, $needle, $offset = 0){
	for($i = $offset; $i < strlen($haystack); $i++){
		#First character of our needle matches a character in the haystack.
		#Lets make sure the rest of the needle matches.
		if($needle[0] == $haystack[$i]){
			#Store i in temp so we can revert back and continue searching if this doesn't match
			$count = $i + 1;
			$match = true;
			for($j = 1; $j < strlen($needle); $j++){
				#Detect a mismatch and break out of the inner loop to continue searching.
				if($needle[$j] != $haystack[$count]){
					$match = false;
					break;
				}
				$count++;
			}
			if($match){ return $i; }
		}
	}
	return false;
}


$alphabet = 'abcdefghijklmnopqrstuvwxyz';

# Should print "17"
print(my_strpos($alphabet, 'r') . "\n");

# Should print "6"
print(my_strpos($alphabet, 'ghi') . "\n");

# Should print "bool(false)"
var_dump(my_strpos($alphabet, 'u', 22));

# Should print "bool(false)"
var_dump(my_strpos($alphabet, 'A'));

# Should print "bool(false)"
var_dump(my_strpos($alphabet, 'ghk'));

?>