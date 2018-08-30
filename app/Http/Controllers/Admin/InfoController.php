<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Info;
use DB;

class InfoController extends Controller
{
    public function index(){
        $phone = DB::table('infos')->where('name','phone')->first();
        $address = DB::table('infos')->where('name','address')->first();
        $email = DB::table('infos')->where('name','email')->first();
        $companyName = DB::table('infos')->where('name','companyName')->first();
        $logo = DB::table('infos')->where('name','logo')->first();
        $facebook = DB::table('infos')->where('name','facebook')->first();
        $youtube = DB::table('infos')->where('name','youtube')->first();

        if (!$phone){$model = new Info();$model->name = 'phone';$model->save();}
        if (!$address){$model = new Info();$model->name = 'address';$model->save();}
        if (!$email){$model = new Info();$model->name = 'email';$model->save();}
        if (!$companyName){$model = new Info();$model->name = 'companyName';$model->save();}
        if (!$logo){$model = new Info();$model->name = 'logo';$model->save();}
        if (!$facebook){$model = new Info();$model->name = 'facebook';$model->save();}
        if (!$youtube){$model = new Info();$model->name = 'youtube';$model->save();}

        $phone = DB::table('infos')->where('name','phone')->first()->info;
        $address = DB::table('infos')->where('name','address')->first()->info;
        $email = DB::table('infos')->where('name','email')->first()->info;
        $companyName = DB::table('infos')->where('name','companyName')->first()->info;
        $logo = DB::table('infos')->where('name','logo')->first()->info;
        $facebook = DB::table('infos')->where('name','facebook')->first()->info;
        $youtube = DB::table('infos')->where('name','youtube')->first()->info;

        return view('admin.info.info',[
            'phone'=>$phone,
            'address'=>$address,
            'email'=>$email,
            'companyName'=>$companyName,
            'logo'=>$logo,
            'facebook'=>$facebook,
            'youtube'=>$youtube
        ]);
    }
    public function update(Request $request){
        DB::table('infos')->where('name','phone')->update(['info'=> $request->phone]);
        DB::table('infos')->where('name','address')->update(['info'=> $request->address]);
        DB::table('infos')->where('name','email')->update(['info'=> $request->email]);
        DB::table('infos')->where('name','companyName')->update(['info'=> $request->companyName]);
        DB::table('infos')->where('name','logo')->update(['info'=> $request->logo]);
        DB::table('infos')->where('name','facebook')->update(['info'=> $request->facebook]);
        DB::table('infos')->where('name','youtube')->update(['info'=> $request->youtube]);

        return redirect()->route('info');
    }
}
