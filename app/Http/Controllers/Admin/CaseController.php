<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CaseModel;
use App\Models\Client;

class CaseController extends Controller
{
    public function index()
    {
        $cases = CaseModel::with('client')->latest()->get();
        return view('admin.cases.index', compact('cases'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('admin.cases.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
            'title' => 'required',
        ]);

        CaseModel::create($request->all());

        return redirect()->route('cases.index')->with('success', 'Case added');
    }

    public function edit(CaseModel $case)
    {
        $clients = Client::all();
        return view('admin.cases.edit', compact('case', 'clients'));
    }

    public function update(Request $request, CaseModel $case)
    {
        $request->validate([
            'client_id' => 'required',
            'title' => 'required',
        ]);

        $case->update($request->all());

        return redirect()->route('cases.index')->with('success', 'Case updated');
    }

    public function destroy(CaseModel $case)
    {
        $case->delete();
        return back()->with('success', 'Case deleted');
    }
}