<?php

namespace App\Http\Controllers;

use App\Models\ApiDoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiDocController extends Controller
{
 public function index()
{
    $docs = ApiDoc::where('is_active', true)
        ->orderBy('module')
        ->orderBy('title')
        ->get()
        ->groupBy('module');

    return view('api-docs.index', compact('docs'));
}



    public function create()
{
    return view('api-docs.create');
}


    public function show(ApiDoc $apiDoc)
    {
    

        return view('api-docs.show', compact('apiDoc'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'module'   => 'required',
            'title'    => 'required',
            'method'   => 'required',
            'endpoint' => 'required',
        ]);

        ApiDoc::create([
            'organization_id' => auth()->user()->organization_id,
            'module'           => $request->module,
            'title'            => $request->title,
            'method'           => $request->method,
            'endpoint'         => $request->endpoint,
            'description'      => $request->description,
            'request_example'  => $request->request_example,
            'response_example' => $request->response_example,
            'notes'            => $request->notes,
        ]);

        return back()->with('success', 'API doc added');
    }
}
