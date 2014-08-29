PHP ShortId Helper
==================

Example
-----
```php
<?php

use frostealth\Helpers\ShortId

$id = 7777777;
$encoded = ShortId::encode($id);
echo $encoded; // vRd1

$decoded = ShortId::decode($encoded);
echo $decoded; // 7777777
```