function foo(array $arr) {
  foreach ($arr as $key => $value) {
    if ($value === null) {
      unset($arr[$key]);
    }
  }
  return $arr;
}

$arr = [1, 2, null, 4, null, 6];
$result = foo($arr);
print_r($result); // Output: Array ( [0] => 1 [1] => 2 [3] => 4 [5] => 6 )

//This code has a subtle bug. When you unset an element from an array
//while iterating through it using a foreach loop, the keys will be reindexed.
//As a result, some elements might be skipped in the iteration, leading to an unexpected output.

//Here's an example to clarify: 
//In the first iteration, $key is 2 and $value is null. Unset($arr[2]) removes the element at index 2.
//The array becomes [1, 2, 4, null, 6].
//Then, the loop goes to the next element at key 3, which is null. The element at index 3 is removed.
//The array becomes [1, 2, 4, 6]. But the foreach loop ends without processing the last null.
//The function doesn't handle this properly, leading to an unexpected result.