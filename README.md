# Hook
small hook library

# Installation
you can download this with composer (packagist)
<pre><code>composer require ryanhs/hook</code></pre>


#### example 1
<pre><code>
require 'vendor/autoload.php'; // composer autoload

$hook = new \Ryanhs\Hook();
$hook->on('init', function(){ echo 'hello'; });
/*
.
.
.
*/

$hook->call('init');
</code></pre>

# License
MIT License
			
