<?php

namespace App\Services\Category;

use App\Repositories\Contracts\Category\CategoryRepositoryInterface;
use App\Repositories\Contracts\Tenant\TenantRepositoryInterface;

class CategoryService
{
    protected $categoryRepository, $tenantRepository;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        TenantRepositoryInterface $tenantRepository
    ) {
        $this->categoryRepository   = $categoryRepository;
        $this->tenantRepository     = $tenantRepository;
    }

    public function getCategoriesByUuid( string $uuid )
    {
        $tenant = $this->tenantRepository->getTenantByUuid( $uuid );

        return $this->categoryRepository->getCategoriesByTenantId( $tenant->id );
    }

} // tenantRepository
