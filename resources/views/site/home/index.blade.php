@php
$logo = DB::table('photos')
    ->where('type', 'logo')
    ->first();
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443 ? 'https://' : 'http://';
$urlLogo = $protocol . $_SERVER['HTTP_HOST'] . '/public/upload/images/photo/thumb/' . $logo->photo;
@endphp
@extends('site.layout')
@section('SEO_title', $settings['SEO_TITLE'])
@section('SEO_keywords', $settings['SEO_KEYWORDS'])
@section('PHOTO', $urlLogo)
@if (isset($image->mimeType) && isset($image->width) && isset($image->height))
    @section('mimeType', $image->mimeType)
    @section('width', $image->width)
    @section('height', $image->height)
@endif
@section('SEO_description', $settings['SEO_DISCRIPTION'])
@section('content')
    <div class="bottom-header bg-green">
        <div class="container">
            <ul class="list-category">
                @foreach ($categoryNoibat as $item)
                    @php
                        $slugCategoryLV1 = DB::table('categories')
                            ->select('slug')
                            ->where('id', $item->parent_id)
                            ->where('status', 1)
                            ->first();
                    @endphp
                    <li><a href="/danh-muc/{{ $slugCategoryLV1->slug }}/{{ $item->slug }}">{{ $item->name }}</a></li>
                @endforeach
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
            {{-- @include('site.inc.slide') --}}
            <!-- content -->
            {{-- <h2 class="product-new">{{__('lang.about_us')}}</h2>
            <div class="pr">
                <p>{!! substr($pageGT->content, 0, 900) !!}</p>
                <a class="xt" href="/gioi-thieu">{{ __('lang.more') }}</a>
            </div>
            <div class="clears"></div> --}}
            <div class="row">
                <div class="col-md-1">
                    <div class="a">
                        <div id="socialsticky" class="vertical-social-i" style="left: 142.6px;">
                            <ul class="ssk-sticky">
                                <li><a href="#" class="fb ssk ssk-facebook"></a>
                                </li>
                                <li><a href="#" class="tw ssk ssk-twitter"></a></li>

                                <li><a href="#" class="lnk ssk ssk-pinterest"></a>
                                </li>
                                <li><a href="#" class="pin ssk ssk-linkedin"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8" style="background-color: white;">
                    @include('site.inc.breadcrumb', [
                        'param1' => request()->segment(1),
                        'param2' => request()->segment(2),
                        'param3' => request()->segment(3),
                    ])
                    @foreach ($news as $item)
                        <div class="product-content">
                            <h1 class="title-content">{{ $item->title }}</h1>
                            <p class="post-admin">by <a
                                    href="">{{ $settings['DTBAN'] }}</a>&#160;|&#160;<span>{{ $item->created_at->format('F d, Y, h:i') }}</span>
                            </p>
                            <div class="col-sm-12 img-content">
                                <img src="{{ asset('public/upload/images/news/thumb/' . $item->photo) }}"
                                    alt="{{ $item->title }}">
                            </div>
                            <div class="desc">
                                {{ $item->description }} <span><a href="">Xem thêm...</a></span>
                            </div>
                            <div class="subricbe">
                                <div class="g-ytsubscribe" data-channelid="{{$settings['ID_CHANNEL_YOUTUBE']}}" data-layout="default"
                                    data-count="default"></div>
                                <div class="fb-like" data-href="{{$settings['FANPAGE']}}" data-width="" data-layout="standard" data-action="like" data-size="small" data-share="true"></div>
                            </div>
                        </div>
                    @endforeach
                    <div class="pagination-defaut">{{ $news->links() }}</div>
                    {{-- <div class="read-more"><a href="">Xem Thêm</a></div> --}}
                </div>

                <div class="col-md-3">
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
                                        @foreach ($newsDate as $item)
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
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="row">
                                        @foreach ($newsMonth as $item)
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
                                        @endforeach

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="row">
                                        @foreach ($newsYear as $item)
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
                                        @endforeach
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
                                            value="{{ old('name') }}" placeholder="{{ __('lang.fullname') }}"
                                            required>
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
        </div>
        {{-- <div class="container">
            <div class="video-clip">
                <h2 class="product-new">Video Clip</h2>
                <p class="sk-fml">Góc chia sẽ cẩm nang về thiết bị y tế chúng tôi gữi đến các bạn</p>
                <p style="text-align: center; margin-top: 0;"><img
                        src="{{ asset('public/site/images/border-xoan.jpg') }}" alt="">
                </p>
                <div class="row video-clip-blocks">
                    <div class="owl-carousel owl-theme">
                        @foreach ($video as $key => $item)
                            <div class="item">
                                <iframe style="width: 100%;" height="250"
                                    src="https://www.youtube.com/embed/{{ $item->link_youtube }}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="news-events">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="news-events-title">TIN TỨC & SỰ KIỆN</h2>
                        <img src="{{ asset('public/site/images/border.jpg') }}" alt="">
                        <ul id="scroller">
                            @foreach ($news as $item)
                                <li>
                                    <div class="border-content">
                                        <div class="text-news">
                                            <h4 class="title-news">
                                                <a href="/tin-tuc/{{ $item->slug }}">{{ $item->title }}</a>
                                            </h4>
                                            <p class="des-news">
                                                {{ $item->description }}
                                            </p>
                                        </div>
                                        <div class="img-news">
                                            <a href="/tin-tuc/{{ $item->slug }}"><img
                                                    src="public/upload/images/news/thumb/{{ $item->photo }}"
                                                    alt="{{ $item->title }}"></a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h2 class="news-events-title">Ý KIẾN KHÁCH HÀNG</h2>
                        <img src="{{ asset('public/site/images/border.jpg') }}" alt="">
                        <div class="customer-avt">
                            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($review as $key => $item)
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                            <img src="{{ asset('public/upload/images/yKien/thumb/' . $item->photo) }}"
                                                alt="">
                                            <p class="customer-review">{!! $item->description !!}</p>
                                            <blockquote>
                                                <p class="name-customer">{{ $item->name }}</p>
                                                <p class="address">{{ $item->address }}</p>
                                            </blockquote>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- <div id="bando_footer">
            {!! $settings['MAP_IFRAME'] !!}
        </div> --}}

        <!-- Modal -->
        <div class="modal fade" id="modal_map" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Bản đồ</h5>
                        <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @push('script_site')
        <script>
            $('.video-clip-blocks .owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                autoplay: false,
                autoplayTimeout: 5000,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 3
                    }
                }
            });

            $('.criteria-blocks .owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                autoplay: true,
                autoplayTimeout: 5000,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                }
            });



            // $(document).ready(function() {

            //     loadCate1();
            //     loadCate2()

            //     function loadCate1() {
            //         let id = $("[id1-cate-lv1]").attr("id1-cate-lv1")
            //         var show_product = $("#chemistry-a");

            //         $.ajax({
            //             method: "GET",
            //             url: "/category-lv1-show-products/" + id,
            //             data: {
            //                 id: id
            //             },
            //             success: function(data) {
            //                 show_product.html(data);
            //             }
            //         });
            //     }

            //     function loadCate2() {
            //         let id = $("[id2-cate-lv1]").attr("id2-cate-lv1");
            //         var show_product = $("#medical-equipment-b");

            //         $.ajax({
            //             method: "GET",
            //             url: "/category-lv1-show-products/" + id,
            //             data: {

            //                 id: id
            //             },
            //             success: function(data) {
            //                 show_product.html(data);
            //             }
            //         });
            //     }

            //     $("[category-id]").click(function() {
            //         let id = $(this).attr('category-id');
            //         var show_product = $("#chemistry-" + id);
            //         //console.log(id);
            //         //let _token = $('meta[name="csrf-token"]').attr('content');

            //         $.ajax({
            //             method: "GET",
            //             url: "{{ route('show.product.category') }}",
            //             data: {

            //                 id: id
            //             },
            //             success: function(data) {
            //                 show_product.html(data);
            //             }
            //         });
            //     });

            //     $("[category-id]").click(function() {
            //         let id = $(this).attr('category-id');
            //         var show_product = $("#medical-equipment-" + id);
            //         //console.log(id);
            //         //let _token = $('meta[name="csrf-token"]').attr('content');

            //         $.ajax({
            //             method: "GET",
            //             url: "{{ route('show.product.category') }}",
            //             data: {

            //                 id: id
            //             },
            //             success: function(data) {
            //                 show_product.html(data);
            //             }
            //         });
            //     });

            //     $("[data-id]").click(function() {
            //         $('#modal_map').modal('show');
            //         let id = $(this).attr('data-id');
            //         let _token = $('meta[name="csrf-token"]').attr('content');
            //         $(document).on('click', '.modal-close', function() {
            //             $('#my_modal').modal('hide');
            //         })
            //         $.ajax({
            //             method: "POST",
            //             url: "{{ route('show.map') }}",
            //             data: {
            //                 _token: _token,
            //                 id: id
            //             },
            //             success: function(data) {
            //                 if (data.status) {
            //                     //console.log(data);
            //                     if (data.data.map != null) {
            //                         $('.modal-body').html(data.data.map);
            //                     } else {
            //                         $('.modal-body').html("Đang cập nhật");
            //                     }
            //                 } else {
            //                     $('.modal-body').html("Đang cập nhật");
            //                 }
            //             }
            //         });
            //     });
            // })
        </script>
    @endpush
