<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SiteSettingController extends Controller
{
    public function SiteSetting()
    {
        $setting = SiteSetting::find(1);
        return view('backend.setting.setting_update', compact('setting'));
    } //End Method

    public function SiteSettingUpdate(Request $request)
    {
        $setting_id = $request->id;
        $old_image = $request->old_image;

        if ($request->file('logo')) {
            $request->validate([
                'logo' => 'image|max:2048'
            ], [
                'logo.image' => 'The uploaded file must be an image in one of the following formats: jpg, jpeg, png, bmp, gif, svg, or webp.',
                'logo.max' => 'The maximum upload image size is 2MB.',
            ]);
            if (file_exists($old_image)) {
                unlink($old_image);
            }
            $file = $request->file('logo');
            $filename = hexdec(uniqid()) . '_logo' . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/logo'), $filename);
            $save_url = 'upload/logo/' . $filename;

            SiteSetting::findOrFail($setting_id)->update([
                'support_phone' => $request->support_phone,
                'call_us_phone' => $request->call_us_phone,
                'email' => $request->email,
                'company_address' => $request->company_address,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'youtube' => $request->youtube,
                'instagram' => $request->instagram,
                'pinterest' => $request->pinterest,
                'copyright' => $request->copyright,
                'logo' => $save_url,
                'updated_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Site Setting Updated With Image Successfully!',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        } else {
            SiteSetting::findOrFail($setting_id)->update([
                'support_phone' => $request->support_phone,
                'call_us_phone' => $request->call_us_phone,
                'email' => $request->email,
                'company_address' => $request->company_address,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'youtube' => $request->youtube,
                'instagram' => $request->instagram,
                'pinterest' => $request->pinterest,
                'copyright' => $request->copyright,
                'updated_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Site Setting Updated Without Image Successfully!',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        }
    } //End Method
}
