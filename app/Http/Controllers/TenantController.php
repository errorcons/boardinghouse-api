<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function index()
    {
        return response()->json(Tenant::all());
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:tenants,email',
        'contract_start_date' => 'required|date',
        'contract_end_date' => 'required|date|after:contract_start_date',
        'rental_amount' => 'required|numeric',
    ]);

    $tenant = Tenant::create($request->all());

    return response()->json([
        'message' => 'Tenant registered successfully',
        'tenant' => $tenant
    ], 201);
}


    public function show($id)
    {
        $tenant = Tenant::find($id);
        if (!$tenant) {
            return response()->json(['message' => 'Tenant not found'], 404);
        }
        return response()->json($tenant);
    }

    public function update(Request $request, $id)
    {
        $tenant = Tenant::find($id);
        if (!$tenant) {
            return response()->json(['message' => 'Tenant not found'], 404);
        }

        $request->validate([
            'email' => 'email|unique:tenants,email,'.$tenant->id,
            'contract_start_date' => 'date',
            'contract_end_date' => 'date|after:contract_start_date',
            'rental_amount' => 'numeric',
        ]);

        $tenant->update($request->all());

        return response()->json($tenant);
    }

    public function destroy($id)
    {
        $tenant = Tenant::find($id);
        if (!$tenant) {
            return response()->json(['message' => 'Tenant not found'], 404);
        }

        $tenant->delete();

        return response()->json(['message' => 'Tenant deleted successfully']);
    }
}
