<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Setting;
use App\Http\Requests\UpdateSiteSettingsRequest;

class SettingsController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }

    public function index() {
        return view('admin.settings.settings')->with('settings', Setting::first());
    }

    public function update(UpdateSiteSettingsRequest $request) {
        $request->updateSiteSettings();
        toastr()->success('Site Settings successfully updated.');

        return back();
    }
}
