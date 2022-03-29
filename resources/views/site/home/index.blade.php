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
                <div class="col-md-8">
                    <div class="list-title">
                        <ol class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a
                                    itemprop="item" href="https://www.femina.in"><span itemprop="name">Home</span>
                                    <meta itemprop="position" content="1">
                                </a></li>

                            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a
                                    itemprop="item" href="https://www.femina.in/beauty"><span itemprop="name">
                                        Làm đẹp </span>
                                    <meta itemprop="position" content="2">
                                </a></li>


                            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a
                                    itemprop="item" href="https://www.femina.in/beauty/hair"><span itemprop="name">
                                        Leather </span>
                                    <meta itemprop="position" content="3">
                                </a></li>


                            <li class="active">
                                <span class="title-name">
                                    Dịch vụ trị mụn - tại sao da bạn lại bị mụn </span>
                            </li>
                        </ol>
                    </div>
                    <div class="product-content">
                        <h1 class="title-content">Dịch vụ trị mụn - tại sao da bạn lại bị mụn</h1>
                        <p class="post-admin">by <a href="">Thẩm Mỹ Kim Liên</a>&#160;|&#160;<span>April 9, 2022,
                                20:36</span> </p>
                        <div class="col-sm-12 img-content">
                            <img src="{{ asset('public/site/images/kamatn1jpg1648182089.jpg') }}" alt="">
                        </div>
                        <div class="desc">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit consequatur maiores, minus
                                tempora et voluptatem impedit deleniti nisi necessitatibus mollitia esse ut nemo, quo error
                                facere culpa odio ullam cum.</p>
                        </div>
                    </div>
                    <div class="product-content">
                        <h1 class="title-content">Dịch vụ trị mụn - tại sao da bạn lại bị mụn</h1>
                        <p class="post-admin">by <a href="">Thẩm Mỹ Kim Liên</a>&#160;|&#160;<span>April 9, 2022,
                                20:36</span> </p>
                        <div class="col-sm-12 img-content">
                            <img src="{{ asset('public/site/images/kamatn1jpg1648182089.jpg') }}" alt="">
                        </div>
                        <div class="desc">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit consequatur maiores, minus
                                tempora et voluptatem impedit deleniti nisi necessitatibus mollitia esse ut nemo, quo error
                                facere culpa odio ullam cum.</p>
                        </div>
                    </div>
                    <div class="read-more"><a href="">Xem Thêm</a></div>
                </div>
                <div class="col-md-3">
                    <div class="right-content">
                        <div class="popular">
                            <h6>Tin nổi bật</h6>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                        aria-controls="home" aria-selected="true">Ngày</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                                        aria-selected="false">Tuần</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                                        aria-selected="false">Tháng</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row">
                                        <div class="col col-md-4 left-popular-img">
                                            <a href="/"><img
                                                    src="{{ asset('public/site/images/bao-ve-muc-tieu-co-dinh-45193922_170x128.png') }}"
                                                    alt=""></a>
                                        </div>
                                        <div class="col col-md-8 right-title-news">
                                            <p class="title-news">Tiêu đề 1</p>
                                            <p class="des-news">Kama Ayurveda’s New Bringadi Masks Are Perfect</p>
                                        </div>
                                        <div class="col col-md-4 left-popular-img">
                                            <a href="/"><img
                                                    src="{{ asset('public/site/images/bao-ve-muc-tieu-co-dinh-45193922_170x128.png') }}"
                                                    alt=""></a>
                                        </div>
                                        <div class="col col-md-8 right-title-news">
                                            <p class="title-news">Tiêu đề 2</p>
                                            <p class="des-news">Kama Ayurveda’s New Bringadi Masks Are Perfect</p>
                                        </div>
                                        <div class="col col-md-4 left-popular-img">
                                            <a href="/"><img
                                                    src="{{ asset('public/site/images/bao-ve-muc-tieu-co-dinh-45193922_170x128.png') }}"
                                                    alt=""></a>
                                        </div>
                                        <div class="col col-md-8 right-title-news">
                                            <p class="title-news">Tiêu đề 3</p>
                                            <p class="des-news">Kama Ayurveda’s New Bringadi Masks Are Perfect</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...
                                </div>
                            </div>
                        </div>
                        <div class="conact-form">
                            <h6>Đặt lịch hẹn, tư vấn</h6>
                            <form class="col-sm-12 form-contact validation-contact"
                                id="form_contact">
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
                                </div>
                                
                                <div class="input-contact">
                                    <textarea rows="4" class="form-control-te" id="noidung" name="content" placeholder="{{ __('lang.content') }}"
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
            <div class="service-blocks">
                <div class="owl-carousel owl-theme">
                    @foreach ($service as $key => $item)
                        <div class="item">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top"
                                    src="{{ asset('public/upload/images/service/thumb/' . $item->photo) }}"
                                    alt="{{ $item->title }}">
                                <div class="card-body">
                                    <p class="card-title" style="text-transform: uppercase;"><a
                                            href="/dich-vu/{{ $item->slug }}">{{ $item->title }}</a></p>
                                    <p class="card-text">
                                        @if (strlen($item->description) > 122)
                                            {{ substr($item->description, 0, 122) . '...' }}
                                        @else
                                            {{ $item->description }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="box-center mt-5">
                <div class="row">
                    <div class="col-md-6 box-logo">
                        <div class="box-tintuc-head-mt">{{ __('lang.recruitment2') }}</div>
                        <div class="box-tintuc-ct-mt">
                            <div class="box-tintuc-ct-mt1">
                                <div class="box-tintuc-ten-mt1">
                                    <p>{{ $recruit->title }}</p>
                                </div>
                                <div class="mota-tintuc-mt">
                                    {{ $recruit->description }}
                                </div>
                                <a href="/tuyen-dung/{{ $recruit->slug }}"> {{ __('lang.more') }} ...</a>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 box-logo">
                        <div class="box-tintuc-head-mt">LOGO</div>
                        <div class="box-tintuc-ct-mt">
                            <div class="doitac-tintuc">
                                <div class="owl-carousel owl-theme">
                                    @foreach ($partner as $key => $item)
                                        <div class="item">
                                            <img src="{{ asset('public/upload/images/photo/thumb/' . $item->photo) }}"
                                                alt="{{ $item->title }}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <img src="{{ asset('public/upload/images/photo/thumb/' . $bannerContent->photo) }}" alt="">
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="banner-criteria">
            <div class="container">
                <h2 class="distance">{{ __('lang.criteria') }}</h2>
                <p class="discription">{{ __('lang.title_criteria') }}</p>
                <div class="row criteria-blocks">
                    <div class="owl-carousel owl-theme">
                        @foreach ($standard as $key => $item)
                            <div class="item">
                                <div class="col-md-4 criteria-option col-6 img-flucol-6">
                                    <div class="hinh_chonct">
                                        <a href="#"><img class="eeee"
                                                src="{{ asset('public/upload/images/standard/thumb/' . $item->photo) }}"
                                                alt="GIÁ CẢ CẠNH TRANH"></a>
                                    </div>
                                    <div class="wrapper">
                                        <h4 class="third after">{{ $item->title }}</h4>
                                    </div>
                                    <p class="standard-content">{{ $item->description }}</p>
                                </div>
                            </div>
                        @endforeach
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
        <div class="banner-criteria banner-imgall">
            <div class="container">
                <h2 class="distance">{{ __('lang.album_hinhanh') }}</h2>
                <div class="album-hinh-anh" style="margin-top: 35px;">
                    <div class="owl-carousel owl-theme">
                        @foreach ($album as $item)
                            <div class="item">
                                <div class="col-md-3 criteria-option col-6 img-flucol-6">
                                    <div class="img_all">
                                        <img class="eeee"
                                            src="{{ asset('public/upload/images/photo/thumb/' . $item->photo) }}"
                                            alt="{{ asset('public/upload/images/photo/thumb/' . $item->photo) }}">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div id="bando_footer">
            {!! $settings['MAP_IFRAME'] !!}
        </div>

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

            $('.album-hinh-anh .owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                dots: false,
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
                        items: 4
                    }
                }
            });

            $('.doitac-tintuc .owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                dots: false,
                autoplay: true,
                autoplayTimeout: 4000,
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

            $('.service-blocks .owl-carousel').owlCarousel({
                loop: true,
                dots: false,
                margin: 10,
                nav: false,
                autoplay: true,
                autoplayTimeout: 4000,
                responsive: {
                    0: {
                        items: 2
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 4
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
