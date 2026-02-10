<?php

namespace App\Http\Controllers\Onboarding;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Subscription;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::where('active', true)->get();
        return view('onboarding.setup.package', compact('packages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'package_id' => 'required|exists:packages,id'
        ]);

        Subscription::create([
            'organization_id' => auth()->user()->organization_id,
            'package_id' => $request->package_id,
            'starts_at' => now(),
            'status' => 'active'
        ]);

        return redirect()->route('setup.preferences');
    }
}
