# PHP Foreach Loop and Unset() Bug

This repository demonstrates a subtle bug in PHP when using `unset()` within a `foreach` loop to remove elements from an array.  The bug arises because `unset()` reindexes the array, causing elements to be skipped during iteration.  The provided code shows the bug, and a corrected version is also included.

## Bug Description
When using `unset()` to remove elements from an array within a `foreach` loop, the array's internal indexing is modified. This means the loop might unintentionally skip elements, leading to incorrect results.  This is often difficult to debug because it's not immediately apparent.

## Solution
The solution avoids modifying the array during iteration, instead collecting the elements to keep in a new array and returning that.  This ensures all elements are processed correctly.