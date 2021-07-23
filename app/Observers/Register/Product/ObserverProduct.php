<?php

namespace App\Observers\Register\Product;

use App\Models\Register\Product\Product;
use Illuminate\Support\Str;

class ObserverProduct
{
    /**
     * Handle the Product "creating" event.
     *
     * @param  \App\Models\Register\Product\Product  $product
     * @return void
     */
    public function creating( Product $product )
    {
        $product->flag = Str::kebab( $product->title );
    }

    /**
     * Handle the Product "updating" event.
     *
     * @param  \App\Models\Register\Product\Product  $product
     * @return void
     */
    public function updating( Product $product )
    {
        $product->flag = Str::kebab( $product->title );
    }

} // ObserverProduct
