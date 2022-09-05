<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function editshipping($type){
       if($type =='free'){

           $shippingmethod=Setting::where('key','free_shipping_cost')->first();

       }
       elseif($type =='local'){
        $shippingmethod=Setting::where('key','local_shipping_cost')->first();

       }
       elseif($type =='outer'){
        $shippingmethod=Setting::where('key','outer_shipping_cost')->first();

       }
       else{

        $shippingmethod=Setting::where('key','free_shipping_cost')->first();

       }
       return view('dashboard.settings.shippings.edit',compact('shippingmethod'));
    }
    public function updateshipping(SettingRequest $request , $id){
        $shippingmethod=Setting::find($id);
        $shippingmethod->update($request->all());
        return redirect()->back()->with(['success'=>'تم التعديل بنجاح']);

    }

}
