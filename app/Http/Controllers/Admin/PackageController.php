<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::orderBy('price')->get();
        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.packages.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'max_users' => 'required|integer',
            'max_borrowers' => 'required|integer',
            'sms_limit' => 'nullable|integer',
            'api_access' => 'boolean',
            'active' => 'boolean',
        ]);

        Package::create($data);

        return redirect()
            ->route('admin.packages.index')
            ->with('success', 'Package created successfully');
    }

    public function edit(Package $package)
    {
        return view('admin.packages.edit', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'max_users' => 'required|integer',
            'max_borrowers' => 'required|integer',
            'sms_limit' => 'nullable|integer',
            'api_access' => 'boolean',
            'active' => 'boolean',
        ]);

        $package->update($data);

        return redirect()
            ->route('admin.packages.index')
            ->with('success', 'Package updated successfully');
    }


    public function destroy(Package $package)
{
    // 🔒 Safety check (recommended)
    if ($package->subscriptions()->exists()) {
        return back()->with('error', 'Cannot delete a package with active subscriptions.');
    }

    $package->delete();

    return redirect()
        ->route('admin.packages.index')
        ->with('success', 'Package deleted successfully');
}

}
