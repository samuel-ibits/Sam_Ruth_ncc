<?php

namespace App\Http\Controllers;
use App\Repositories\Tenant\TenantInterface;
use App\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    
    private $tenant;

    public function __construct(TenantInterface $tenant)
    {
        $this->tenant = $tenant;
    }

    public function index()
    {
        return $this->tenant->GetAllTenants();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
       public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function show(Tenant $tenant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function edit(Tenant $tenant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tenant $tenant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tenant $tenant)
    {
        //
    }

    public function searchtenantbyname($tenantname)
    {
        if (!empty($tenantname)) {
            return $this->tenant->SearchTenantByName($tenantname);
        } else {
            return array();
        }
    }

}
