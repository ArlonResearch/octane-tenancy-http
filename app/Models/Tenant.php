<?php

namespace App\Models;

use Illuminate\Http\Request;
use Tenancy\Identification\Concerns\AllowsTenantIdentification;
use Tenancy\Identification\Contracts\Tenant as ContractsTenant;
use Tenancy\Identification\Drivers\Http\Contracts\IdentifiesByHttp;

class Tenant extends User implements ContractsTenant, IdentifiesByHttp
{
    use AllowsTenantIdentification;

    protected $table = 'users';

    public function tenantIdentificationByHttp(Request $request): ?ContractsTenant
    {
        return $this->newQuery()->get()->random();
    }
}
