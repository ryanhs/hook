# Hook
small hook library

# Installation
you can download this with composer (packagist)
<pre><code>composer require ryanhs/hook</code></pre>


#### example 1
<pre><code>require 'vendor/autoload.php'; // composer autoload

use \Ryanhs\Hook\Hook;

Hook::on('init', function(){ echo 'hello'; });
/*
.
.
.
*/

Hook::call('init');
</code></pre>

# License
MIT License
			
