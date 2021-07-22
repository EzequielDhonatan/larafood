<?php

namespace App\Observers\Register\Category;

use App\Models\Register\Category\Category;
use Illuminate\Support\Str;

class CategoryObserver
{
    /**
     * Handle the Category "created" event.
     *
     * @param  \App\Models\Register\Category\Category  $category
     * @return void
     */
    public function creating( Category $category )
    {
        $category->url = Str::kebab( $category->name ); // Recupera o "name" da categoria e converte em "url"
    }

    /**
     * Handle the Category "updated" event.
     *
     * @param  \App\Models\Register\Category\Category  $category
     * @return void
     */
    public function updating( Category $category )
    {
        $category->url = Str::kebab( $category->name ); // Recupera o "name" da categoria e converte em "url"
    }

} // CategoryObserver
