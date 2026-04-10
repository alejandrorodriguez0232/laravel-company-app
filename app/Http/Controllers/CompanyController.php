<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function edit()
    {
        $company = Auth::user()->company;
        return view('company.edit', compact('company'));
    }

    public function update(UpdateCompanyRequest $request)
    {
        $company = Auth::user()->company;
        
        $company->update($request->validated());
        
        return redirect()->route('dashboard')->with('success', 'Empresa actualizada correctamente');
    }
}
