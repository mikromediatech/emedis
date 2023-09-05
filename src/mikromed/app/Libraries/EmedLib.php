<?php
// app/Libraries/MyUtility.php
namespace App\Libraries;

class EmedLib {
    public function LoadWebsiteConfiguration() {       

        if (! $foo = cache('foo')) {
            echo 'Saving to the cache!<br>';
            $foo = 'foobarbaz!';
        
            // Save into the cache for 5 minutes
            cache()->save('foo', $foo, 300);
        }

       // $cache = service("cache");

       // dd($cache->getCacheInfo());
        // dd(cache());
       // echo cache('foo');
    }

    public function RefreshConfiguration(){

    }
}
