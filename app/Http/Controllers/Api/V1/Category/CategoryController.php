<?php

namespace App\Http\Controllers\Api\V1\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Category\CategoryService;
use App\Http\Requests\Api\V1\Tenant\TenantFormRequest;
use App\Http\Resources\Category\CategoryResource;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct( CategoryService $categoryService )
    {
        $this->categoryService = $categoryService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categoriesByTenant( TenantFormRequest $request )
    {
        // if ( !$request->token_company )
        //     return response()->json( [ 'message' => 'Token Not Found' ], 404 );

        $categories = $this->categoryService->getCategoriesByUuid( $request->token_company );

        return CategoryResource::collection( $categories );
    }

    public function show( TenantFormRequest $request, $url )
    {
        if ( !$category = $this->categoryService->getCategoryByUrl( $url ) )
            return response()->json( [ 'message' => 'Category Not Found' ], 404 );

        return new CategoryResource( $category );
    }

} // CategoryController
