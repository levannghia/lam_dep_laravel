<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Config;
use App\Models\News;
use App\Models\Category;
use App\Models\SeoPage;
use Illuminate\Support\Facades\Session;
use App\Models\Photo;

class CategorySiteController extends Controller
{
    public function newsCategory($slug)
    {
        $settings = Config::all(['name', 'value'])
            ->keyBy('name')
            ->transform(function ($setting) {
                return $setting->value; // return only the value
            })
            ->toArray();
        $category = Category::where('status', 1)->where('slug',$slug)->orderBy('stt', 'ASC')->first();
        $categoryList = Category::where('status', 1)->where('parent_id',$category->id)->orderBy('stt', 'ASC')->get();
        
        $seoPage = SeoPage::where('type', 'danh-muc')->first();
        $cate_news = News::select('news.photo', 'news.title', 'news.slug')
        ->join('categories', 'categories.id', '=', 'news.category_id')->where('categories.slug',$slug)->where('news.status', 1)->paginate($settings['PHAN_TRANG_PRODUCT']);
        return view('site.category.category_lv1',compact('cate_news','seoPage','category','categoryList'));
    }

    public function categoryLV2($slug,$slug1){
        $settings = Config::all(['name', 'value'])
            ->keyBy('name')
            ->transform(function ($setting) {
                return $setting->value; // return only the value
            })
            ->toArray();
        $locale = Session::get('locale');
        $category = Category::where('status', 1)->where('slug',$slug)->first();
        $categoryLV2 = Category::where('status', 1)->where('parent_id',$category->id)->where('slug',$slug1)->first();
        $categoryList = Category::where('status', 1)->where('parent_id',$category->id)->get();
        $seoPage = SeoPage::where('type', 'danh-muc')->first();
        $category_news = News::select('news.photo', 'news_translations.title', 'news.slug')
        ->join('news_translations','news_translations.news_id','=','news.id')
        ->join('categories', 'categories.id', '=', 'news.category_id')
        ->where('categories.slug',$categoryLV2->slug)->where('news_translations.locale',$locale)
        ->where('news.status', 1)->paginate($settings['PHAN_TRANG_PRODUCT']);
        return view('site.category.index',compact('categoryLV2','categoryList','seoPage','category','settings','category_news'));
    }
}
