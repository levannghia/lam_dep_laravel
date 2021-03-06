<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Config;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\SeoPage;
use App\Models\PageTranslation;
use Illuminate\Support\Facades\Session;

class PageSiteController extends Controller
{
    public function getPageLienHe()
    {
        $settings = Config::all(['name', 'value'])
            ->keyBy('name')
            ->transform(function ($setting) {
                return $setting->value; // return only the value
            })
            ->toArray();
        $locale = Session::get('locale');

        $page = PageTranslation::join('pages', 'pages.id', '=', 'page_translations.page_id')->where('page_translations.locale', $locale)
            ->where('pages.slug', 'lien-he')->first();
        $seoPage = SeoPage::where('type', 'lien-he')->first();
        $image = json_decode(
            $seoPage->options
        );

        return view('site.contact.index', compact('page', 'settings', 'seoPage', 'image'));
    }

    public function getPageGioiThieu()
    {
        $settings = Config::all(['name', 'value'])
            ->keyBy('name')
            ->transform(function ($setting) {
                return $setting->value; // return only the value
            })
            ->toArray();
        $locale = Session::get('locale');

        $page = PageTranslation::join('pages', 'pages.id', '=', 'page_translations.page_id')->where('page_translations.locale', $locale)
            ->where('pages.slug', 'gioi-thieu')->first();
        $seoPage = SeoPage::where('type', 'gioi-thieu')->first();
        $image = json_decode(
            $seoPage->options
        );
        
        //dd($image);
        return view('site.about.index', compact('page', 'settings', 'seoPage', 'image'));
    }

    public function postLienHe(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:40',
            'phone' => 'required|numeric',
            'address' => 'required',
            'note' => 'required',
            'content' => 'required',
            'email' => 'required|email',
            'captcha' => 'required'
        ], [
            "name.required" => "Vui l??ng nh???p h??? t??n",
            "name.max" => "T??n kh??ng qu?? 40 k?? t???",
            "phone.required" => "Vui l??ng nh???p s??? ??i???n tho???i",
            "address.required" => "Vui l??ng nh???p ?????a ch???",
            "note.required" => "Vui l??ng nh???p ch??? ?????",
            "content.required" => "Vui l??ng nh???p n???i dung",
            "email.required" => "Vui l??ng nh???p email",
            "phone.numeric" => "Tr?????ng n??y ph???i l?? s???",
            "email.email" => "Vui l??ng nh???p email",
            "captcha.required" => "Vui l??ng nh???p captcha",
        ]);


        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } elseif(session()->get('captchacode') == $request->captcha) {
            $value = [
                'email' => $request->email,
                'name' => $request->name,
                'note' => $request->note,
                'content' => $request->content,
                'address' => $request->address,
                'status' => 0,
                'phone' => $request->phone,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ];
            $query = DB::table('contacts')->insert($value);

            if ($query) {
                return response()->json(['status' => 1, 'msg' => 'Gui thanh cong']);
            }
        }else{
            return response()->json(['status' => 2, 'msg' => 'Captcha kh??ng ch??nh x??c vui l??ng nh???p l???i!']);
        }
    }
}
