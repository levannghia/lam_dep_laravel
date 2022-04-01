<div class="right-content" id="aaaaa">
    <div class="popular">
        <h6>Tin nổi bật</h6>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                    aria-selected="true">Ngày</a>
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
                    @php
                        use Carbon\Carbon;
                        $now = Carbon::now();
                    @endphp
                    @foreach ($newsTime->whereDate('created_at', $now)->get() as $item)
                        <div class="col col-md-4 left-popular-img">
                            <a href="/">
                                <img src="{{ asset('public/upload/images/news/thumb/' . $item->photo) }}"
                                    alt="{{ $item->title }}">
                            </a>
                        </div>
                        <div class="col col-md-8 right-title-news">
                            <p class="title-news">{{ $item->title }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row">
                    @foreach ($newsTime->whereMonth('created_at', $now->month)->get() as $item)
                        <div class="col col-md-4 left-popular-img">
                            <a href="/">
                                <img src="{{ asset('public/upload/images/news/thumb/' . $item->photo) }}"
                                    alt="{{ $item->title }}">
                            </a>
                        </div>
                        <div class="col col-md-8 right-title-news">
                            <p class="title-news">{{ $item->title }}</p>
                        </div>
                    @endforeach
                   
                </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="row">
                    @foreach ($newsTime->whereYear('created_at', $now->year)->get() as $item)
                        <div class="col col-md-4 left-popular-img">
                            <a href="/">
                                <img src="{{ asset('public/upload/images/news/thumb/' . $item->photo) }}"
                                    alt="{{ $item->title }}">
                            </a>
                        </div>
                        <div class="col col-md-8 right-title-news">
                            <p class="title-news">{{ $item->title }}</p>
                        </div>
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
                    <input type="text" class="form-control" id="ten" name="name" value="{{ old('name') }}"
                        placeholder="{{ __('lang.fullname') }}" required>
                    <div class="invalid-feedback">Vui lòng nhập họ và tên</div>
                    <p class="error_name mt-1 mb-0" style="color:#EF8D21;display:none;"></p>
                </div>
                <div class="input-contact col-sm-12">
                    <input type="number" class="form-control" id="dienthoai" name="phone"
                        placeholder="{{ __('lang.phone_number') }}" required value="{{ old('phone') }}">
                    <div class="invalid-feedback">Vui lòng nhập số điện thoại</div>
                    <p class="error_sdt mt-1 mb-0" style="color:#EF8D21;display:none;"></p>
                </div>
                <div class="date-booking" style="display: flex;">
                    <div class="input-contact col-sm-6">
                        <input type="text" class="form-control" id="datepicker" name="date" placeholder="Date"
                            required value="{{ old('date') }}">
                        <div class="invalid-feedback">Date</div>
                        <p class="error_date mt-1 mb-0" style="color:#EF8D21;display:none;"></p>
                    </div>
                    <div class="input-contact col-sm-6">
                        <input type="text" class="form-control timepicker" name="time" placeholder="8:00 AM" required
                            value="{{ old('time') }}">
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
