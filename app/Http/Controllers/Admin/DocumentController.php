<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Client;
use App\Models\CaseModel;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::with(['client', 'case'])->latest()->get();
        return view('admin.documents.index', compact('documents'));
    }

    public function create()
    {
        $clients = Client::all();
        $cases = CaseModel::all();

        return view('admin.documents.create', compact('clients', 'cases'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
            'file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048'
        ]);

        $file = $request->file('file');
        $path = $file->store('documents', 'public');

        Document::create([
            'client_id' => $request->client_id,
            'case_id' => $request->case_id,
            'file_name' => $file->getClientOriginalName(),
            'file_path' => $path,
        ]);

        return redirect()->route('documents.index')->with('success', 'Document uploaded');
    }

    public function destroy(Document $document)
    {
        $document->delete();
        return back()->with('success', 'Document deleted');
    }
}