--TEST--
Test is_file() function: usage variations - invalid filenames
--FILE--
<?php
/* Prototype: bool is_file ( string $filename );
   Description: Tells whether the filename is a regular file
     Returns TRUE if the filename exists and is a regular file
*/

/* Testing is_file() with invalid arguments -int, float, bool, NULL, resource */

function flatten($variable) {
    \ob_start();
    \var_dump($variable);
    $flattened =
        \ob_get_contents();
    \ob_end_clean();
    return \trim($flattened);
}

foreach([
  /* Invalid filenames */
  -2.34555,
  " ",
  "",
  true,
  false,
  null,

  /* scalars */
  1234,
  0,

  /* resource */
  fopen(__FILE__, "r")
] as $filename ) {
  printf(
      "%s: %d\n",
      flatten($filename), @is_file($filename));
  clearstatcache();
}
?>
--EXPECTF--
float(-2.34555): 0
string(1) " ": 0
string(0) "": 0
bool(true): 0
bool(false): 0
NULL: 0
int(1234): 0
int(0): 0
resource(%d) of type (stream): 0
