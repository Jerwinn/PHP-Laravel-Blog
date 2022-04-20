<?php

namespace App\Http\Controllers;

use App\Models\PostCategory;
use Illuminate\Http\Request;
use App\Models\Setting;

/**
 * This class is used by admins to change post settings.
 */
class SettingsController extends Controller
{
    /**
     * show the view for the admin settings.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function index()
    {
        $setting = Setting::first();
        return view('backend.settings.index',['setting' => $setting]);
    }

    /**
     * This saves the details of the setting onto the database.
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    function saveSettings(Request $request)
    {
        $countSetting=Setting::count();
        if($countSetting == 0) {
            $setting = new Setting;
            $setting->comment_auto_approve = $request->comment_auto_approve;
            $setting->user_auto_approve = $request->user_auto_approve;
            $setting->post_limit = $request->post_limit;
            $setting->popular_limit = $request->popular_limit;
            $setting->comment_recent_limit = $request->comment_recent_limit;
            $setting->save();

        }else{
            $firstSetting = Setting::first();
            $setting = Setting::find($firstSetting -> id);
            $setting->comment_auto_approve = $request->comment_auto_approve;
            $setting->user_auto_approve = $request->user_auto_approve;
            $setting->post_limit = $request->post_limit;
            $setting->popular_limit = $request->popular_limit;
            $setting->comment_recent_limit = $request->comment_recent_limit;
            $setting->save();
        }
        return redirect('admin/settings')->with('success', 'Settings has been changed.');
    }
}
