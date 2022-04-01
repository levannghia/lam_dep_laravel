@php
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443 ? 'https://' : 'http://';
$urlPhoto = $protocol . $_SERVER['HTTP_HOST'] . '/public/upload/images/seoPage/thumb/' . $seoPage->photo;
@endphp
@section('PHOTO', $urlPhoto)
@extends('site.layout')
@section('SEO_title', $categoryLV2->title)
@section('SEO_keywords', $categoryLV2->keywords)
@if (isset($image->mimeType) && isset($image->width) && isset($image->height))
    @section('mimeType', $image->mimeType)
    @section('width', $image->width)
    @section('height', $image->height)
@endif
@section('SEO_description', $categoryLV2->description)
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
            <!-- Banner - menu -->

            {{-- silder --}}

            <!-- content -->
            {{-- <h2 class="product-new">{{$category_name->name}}</h2> --}}

            @include('site.inc.breadcrumb', [
                'param1' => 'Danh mục',
                'param2' => $category->name,
                'param3' => $categoryLV2->name,
            ])
            <div class="row">
                <div class="col-lg-8" style="background-color: white;">
                    <div class="row">
                    @foreach ($category_news as $item)                      
                            <div class="col-lg-6" style="margin-top: 40px;">
                                <div class="row box-category">
                                    <div class="col-md-6">
                                        <div class="border-col">
                                            <div class="detail-product-link">
                                                <a href=""><img
                                                        src="{{ asset('public/upload/images/news/thumb/' . $item->photo) }}"
                                                        alt="" width="200px"></a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6"><a href="">
                                        <h6 class="product-name">{{ $item->title }}</h6>
                                    </a></div>
                                </div>
                            </div>                       
                    @endforeach
                </div>
                </div>
                <div class="col-lg-4">
                    <div class="right-content" id="aaaaa">
                        <div class="popular">
                            <h6>Tin nổi bật</h6>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                        aria-controls="home" aria-selected="true">Ngày</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                                        aria-selected="false">Tháng</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                                        aria-selected="false">Năm</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row">
                                        {{-- @foreach ($newsDate as $item)
                                            @php
                                                $cateSlug1 = DB::table('categories')
                                                    ->where('id', $item->parent_id)
                                                    ->first();
                                            @endphp
                                            @if (isset($cateSlug1))
                                                <div class="col col-md-4 left-popular-img">
                                                    <a
                                                        href="/danh-muc/{{ $cateSlug1->slug }}/{{ $item->cateSlug }}/{{ $item->slug }}">
                                                        <img src="{{ asset('public/upload/images/news/thumb/' . $item->photo) }}"
                                                            alt="{{ $item->title }}">
                                                    </a>
                                                </div>
                                                <div class="col col-md-8 right-title-news">
                                                    <a
                                                        href="/danh-muc/{{ $cateSlug1->slug }}/{{ $item->cateSlug }}/{{ $item->slug }}">
                                                        <p class="title-news">{{ $item->title }}</p>
                                                    </a>
                                                </div>
                                            @endif
                                        @endforeach --}}
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="row">
                                        {{-- @foreach ($newsMonth as $item)
                                            @php
                                                $cateSlug1 = DB::table('categories')
                                                    ->where('id', $item->parent_id)
                                                    ->first();
                                            @endphp
                                             @if (isset($cateSlug1))
                                             <div class="col col-md-4 left-popular-img">
                                                 <a
                                                     href="/danh-muc/{{ $cateSlug1->slug }}/{{ $item->cateSlug }}/{{ $item->slug }}">
                                                     <img src="{{ asset('public/upload/images/news/thumb/' . $item->photo) }}"
                                                         alt="{{ $item->title }}">
                                                 </a>
                                             </div>
                                             <div class="col col-md-8 right-title-news">
                                                 <a
                                                     href="/danh-muc/{{ $cateSlug1->slug }}/{{ $item->cateSlug }}/{{ $item->slug }}">
                                                     <p class="title-news">{{ $item->title }}</p>
                                                 </a>
                                             </div>
                                         @endif
                                        @endforeach --}}

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="row">
                                        {{-- @foreach ($newsYear as $item)
                                            @php
                                                $cateSlug1 = DB::table('categories')
                                                    ->where('id', $item->parent_id)
                                                    ->first();
                                            @endphp
                                             @if (isset($cateSlug1))
                                             <div class="col col-md-4 left-popular-img">
                                                 <a
                                                     href="/danh-muc/{{ $cateSlug1->slug }}/{{ $item->cateSlug }}/{{ $item->slug }}">
                                                     <img src="{{ asset('public/upload/images/news/thumb/' . $item->photo) }}"
                                                         alt="{{ $item->title }}">
                                                 </a>
                                             </div>
                                             <div class="col col-md-8 right-title-news">
                                                 <a
                                                     href="/danh-muc/{{ $cateSlug1->slug }}/{{ $item->cateSlug }}/{{ $item->slug }}">
                                                     <p class="title-news">{{ $item->title }}</p>
                                                 </a>
                                             </div>
                                         @endif
                                        @endforeach --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="conact-form">
                            <h6>Đặt lịch hẹn, tư vấn</h6>
                            <form class="col-sm-12 form-contact validation-contact" id="form_contact" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="input-contact col-sm-12">
                                        <input type="text" class="form-control" id="ten" name="name"
                                            value="{{ old('name') }}" placeholder="{{ __('lang.fullname') }}" required>
                                        <div class="invalid-feedback">Vui lòng nhập họ và tên</div>
                                        <p class="error_name mt-1 mb-0" style="color:#EF8D21;display:none;"></p>
                                    </div>
                                    <div class="input-contact col-sm-12">
                                        <input type="number" class="form-control" id="dienthoai" name="phone"
                                            placeholder="{{ __('lang.phone_number') }}" required
                                            value="{{ old('phone') }}">
                                        <div class="invalid-feedback">Vui lòng nhập số điện thoại</div>
                                        <p class="error_sdt mt-1 mb-0" style="color:#EF8D21;display:none;"></p>
                                    </div>
                                    <div class="date-booking" style="display: flex;">
                                        <div class="input-contact col-sm-6">
                                            <input type="text" class="form-control" id="datepicker" name="date"
                                                placeholder="Date" required value="{{ old('date') }}">
                                            <div class="invalid-feedback">Date</div>
                                            <p class="error_date mt-1 mb-0" style="color:#EF8D21;display:none;"></p>
                                        </div>
                                        <div class="input-contact col-sm-6">
                                            <input type="text" class="form-control timepicker" name="time"
                                                placeholder="8:00 AM" required value="{{ old('time') }}">
                                            <div class="invalid-feedback">Time</div>
                                            <p class="error_time mt-1 mb-0" style="color:#EF8D21;display:none;"></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-contact">
                                    <textarea rows="3" class="form-control-te" id="noidung" name="content" placeholder="{{ __('lang.content') }}"
                                        required>{{ old('content') }}</textarea>
                                    <div class="invalid-feedback">Vui lòng nhập nội dung</div>
                                    <p class="error_content mt-1 mb-0" style="color:#EF8D21;display:none;"></p>
                                </div>

                                <input type="button" class="btn btn-leather" name="submit-contact" id="btn_send"
                                    value="{{ __('lang.btnSubmit') }}">

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{ $category_news->links() }}

        </div>
    </div>

@endsection
