@php
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443 ? 'https://' : 'http://';
$urlPhoto = $protocol . $_SERVER['HTTP_HOST'] . '/public/upload/images/seoPage/thumb/' . $seoPage->photo;
@endphp
@section('PHOTO', $urlPhoto)
@extends('site.layout')
@section('SEO_title', '')
@section('SEO_keywords', '')
@if (isset($image->mimeType) && isset($image->width) && isset($image->height))
    @section('mimeType', $image->mimeType)
    @section('width', $image->width)
    @section('height', $image->height)
@endif
@section('SEO_description', '')
@section('content')
    <div class="bottom-header bg-green">
        <div class="container">
            <ul class="list-category">
                @if (isset($category))
                    @foreach ($categoryList as $item)
                        <li><a href="/danh-muc/{{ $category->slug }}/{{ $item->slug }}"
                                class="{{ request()->segment(3) == $item->slug ? 'active' : '' }}">{{ $item->name }}</a>
                        </li>
                    @endforeach
                @endif
                <li>
                    <form class="form-inline my-2 my-lg-0" action="{{ route('search.product') }}">
                        <div id="search">
                            <input type="text" name="q" id="keyword" class="form-control mr-sm-2 search-input" type="search"
                                placeholder="{{ __('lang.search') }}..." aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"
                                    aria-hidden="true"></i></button>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <div class="content">
        <div class="container">
            @include('site.inc.breadcrumb', [
                'param1' => 'Danh mục',
                'param2' => $category->name,
                'param3' => '',
            ])
            <div class="row">
                @foreach ($categoryList as $item)
                    @php
                        $locale = Session::get('locale');
                        $news = DB::table('news')
                            ->select('news.photo', 'news_translations.title', 'news.slug')
                            ->join('news_translations', 'news_translations.news_id', '=', 'news.id')
                            ->join('categories', 'categories.id', '=', 'news.category_id')
                            ->where('news.category_id', $item->id)
                            ->where('news.status', 1)
                            ->where('news_translations.locale', $locale)
                            ->orderBy('stt', 'ASC')
                            ->take(5)
                            ->get();
                    @endphp
                    @if (count($news) > 0)
                        <div class="col-lg-4">
                            <div class="card-deck">
                                <div class="card">
                                    <h3 class="title-product"><a href="/danh-muc/{{ $category->slug }}/{{ $item->slug }}">{{ $item->name }} <i
                                                class="fa fa-angle-right" aria-hidden="true"></i></a></h3>
                                    <a href="/danh-muc/{{ $category->slug }}/{{ $item->slug }}/{{ $news[0]->slug }}"><img
                                            class="img-thumbnail-main"
                                            src="{{ asset('public/upload/images/news/thumb/' . $news[0]->photo) }}"
                                            class="card-img-top" alt="{{ $news[0]->title }}"></a>
                                    <div class="card-body">
                                        <h5 class="card-title"><a
                                                href="/danh-muc/{{ $category->slug }}/{{ $item->slug }}/{{ $news[0]->slug }}">{{ $news[0]->title }}</a>
                                        </h5>
                                        <div class="row">
                                            @foreach ($news as $key => $value)
                                                @if ($key != 0)
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-5">
                                                                <a
                                                                    href="/danh-muc/{{ $category->slug }}/{{ $item->slug }}/{{ $value->slug }}"><img
                                                                        class="img-thumbnail"
                                                                        src="{{ asset('public/upload/images/news/thumb/' . $value->photo) }}"
                                                                        alt="{{ $value->title }}"></a>
                                                            </div>
                                                            <div class="col-lg-7">
                                                                <h5 class="card-title-footer"><a
                                                                        href="/danh-muc/{{ $category->slug }}/{{ $item->slug }}/{{ $value->slug }}">{{ $value->title }}</a>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <label class="text-muted"><a
                                                href="/danh-muc/{{ $category->slug }}/{{ $item->slug }}">VIEW
                                                MORE</a></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

        </div>
    </div>
@endsection
