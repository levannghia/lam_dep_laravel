<header>
    <div class="top-header">
        <div class="container">
            <div class="top-header-block">
                <div class="company-address">
                    {{-- <i class="fa fa-map-marker-alt"></i>
                    <span>{{ $settings['ADDRESS'] }}</span> --}}
                </div>
                <div class="contact-block">
                    <ul class="contact-block-list">
                        <p class="phone-header"><i class="fa fa-phone" aria-hidden="true"></i>
                            {{ $settings['PHONE'] }}</p>
                        @foreach ($mxh_top as $item)
                            <li class="contact-block-item">
                                <a href="{{ $item->link }}" class="contact-block-link">
                                    <img src="{{ asset('public/upload/images/photo/large/' . $item->photo) }}" alt="">
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header-content">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-nav">
                <div class="banner_image">
                    <a class="navbar-brand logo-img" href="/">
                        <img src="{{ asset('public/upload/images/photo/thumb/' . $logo->photo) }}" alt="">
                    </a>
                </div>
                <h1>{{$settings['DTBAN']}}</h1>
                <div class="collapse navbar-collapse phone-contact" id="navbarSupportedContent">
                    <div class="hot_head">
                       
                    </div>
                </div>
            </nav>

        </div>
    </div>
    <div class="menu-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <!-- <a class="navbar-brand danh-muc pd-li" href="#"><img src="images/taxes-menu-icon.png" alt=""> DANH MỤC
                    SẢN PHẨM</a> -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav pd-li menu-category menu-center">
                        {{-- <li class="nav-item active pd-li icon-size">
                            <a class="nav-link  pd-li" href="/">
                                </a>
                        </li> --}}
                        <li class="nav-item bg-ani">
                            <a class="nav-link" href="/"><img
                                    src="{{ asset('public/site/images/Home-Icon.png') }}" alt=""></a>
                        </li>
                        <li class="nav-item bg-ani {{ Request::path() == '/' ? 'actives' : '' }}">
                            <a class="nav-link" href="/">Trang chủ</a>
                        </li>
                        
                        <li class="nav-item bg-ani {{ Request::path() == 'gioi-thieu' ? 'actives' : '' }}">
                            <a class="nav-link " href="/gioi-thieu">{{ __('lang.about') }}</a>
                        </li>
                        
                        <div class="dropdown">
                            <li class="nav-item bg-ani {{ Request::path() == 'dich-vu' ? 'actives' : '' }}">
                                <a class="nav-link"
                                    href="{{ route('get.service') }}">{{ __('lang.service') }}</a>
                            </li>
                            <div class="dropdown-content">
                                @foreach ($serviceHeader as $item)
                                    <a href="/dich-vu/{{ $item->slug }}">{{ $item->title }}</a>
                                @endforeach
                            </div>
                        </div>
                        
                        @foreach ($category as $item)
                        @php
                            $categoryChirld = DB::table('categories')->where('status',1)->where('parent_id',$item->id)->orderBy('stt','ASC');
                        @endphp
                        <div class="dropdown">
                            <li class="nav-item bg-ani {{ request()->segment(2) == $item->slug ? 'actives' : '' }}">
                                <a class="nav-link " href="/danh-muc/{{ $item->slug }}">{{ $item->name }}</a>
                            </li>
                            @if ($categoryChirld->count())
                            <div class="dropdown-content">
                                @foreach ($categoryChirld->get() as $value)
                                    <a href="/danh-muc/{{$item->slug}}/{{ $value->slug }}">{{ $value->name }}</a>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        @endforeach
                        
                        
                        <li class="nav-item bg-ani {{ Request::path() == 'album' ? 'actives' : '' }}">
                            <a class="nav-link " href="{{ route('get.album') }}">{{ __('lang.album') }}</a>
                        </li>
                        
                        <li class="nav-item bg-ani {{ Request::path() == 'tin-tuc' ? 'actives' : '' }}">
                            <a class="nav-link" href="{{ route('get.news') }}">{{ __('lang.news') }}</a>
                        </li>
                        
                        <li class="nav-item bg-ani {{ Request::path() == 'tuyen-dung' ? 'actives' : '' }}">
                            <a class="nav-link"
                                href="{{ route('get.recruit') }}">{{ __('lang.recruitment') }}</a>
                        </li>
                        
                        <li class="nav-item bg-ani {{ Request::path() == 'lien-he' ? 'actives' : '' }}">
                            <a class="nav-link " href="/lien-he">{{ __('lang.contacts') }}</a>
                        </li>
                     
                    </ul>
                </div>
            </nav>

        </div>
        
    </div>
</header>

