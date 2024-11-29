<?php

namespace Modules\CClassContact\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\CClassContact\App\Models\CClassContact;
use Modules\Company\App\Models\Company;

/**
 * Class CClassContactController
 * @package Modules\CClassContact\App\Http\Controllers
 */
class CClassContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = CClassContact::with('company')->get();
        return view('cclasscontact::admin.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        return view('cclasscontact::admin.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        CClassContact::create($request->all());
        return redirect()->route('cclasscontact.index');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $companies = Company::all();

        $contact = CClassContact::with('company')->findOrFail($id);
        return view('cclasscontact::admin.show', compact('contact', 'companies'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $contact = CClassContact::findOrFail($id);
        $companies = Company::all();
        return view('cclasscontact::admin.edit', compact('contact', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $contact = CClassContact::findOrFail($id);
        $contact->update($request->all());
        return redirect()->route('cclasscontact.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contact = CClassContact::findOrFail($id);
        $contact->delete();
        return redirect()->route('cclasscontact.index');
    }
}
