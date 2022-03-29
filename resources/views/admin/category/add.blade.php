@extends('admin.layout')
@section('title', $row->title)
@section('content')
    
    <div class="content-wrapper">
        @include('admin.inc.message')
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $row->desc }}</h4>
                        {{-- <p class="card-description">
                                Basic form layout
                            </p> --}}
                        @include('admin.inc.error')
                        <form class="forms-sample" method="POST" action="{{ route('admin.category.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="slug">Tên danh mục</label>
                                <input type="text" class="form-control" value="{{ old('name') }}" id="slug" name="name"
                                    placeholder="* Tên phòng" onkeyup="changeToString()">
                            </div>
                            <div class="form-group">
                                <label for="convert_slug">Slug (seo)</label>
                                <input type="text" class="form-control" id="convert_slug" name="slug"
                                    value="{{ old('slug') }}" placeholder="* slug">
                            </div>
                            {{-- <div class="form-group">
                                <label for="exampleInputEmail1">Giá phòng</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="price"
                                    value="{{ old('price') }}" placeholder="* Giá phòng">
                            </div> --}}
                            <div class="form-group">
                                <label for="exampleTextarea1">Danh mục cha</label>
                                <select class="js-example-basic-multiple w-100" name="parent_id">
                                    <option value="0">Chọn danh mục cha</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Trạng thái</label>
                                <select class="js-example-basic-multiple w-100" name="status">
                                    <option value="1">Hiện</option>
                                    <option value="0">Ẩn</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Số thứ tự</label>
                                <input style="width: 11%;" type="text" class="form-control" name="stt"
                                    value="{{ old('stt', 1) }}">
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <a href="{{route('admin.category.index')}}" class="btn btn-light">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @push('script')

        <script>
        //     CKEDITOR.replace('description', {
        //     filebrowserBrowseUrl: '/public/ckfinder/ckfinder.html',
        //     filebrowserUploadUrl: '/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        //     filebrowserWindowWidth: '1000',
        //     filebrowserWindowHeight: '700'
        // });
        </script>
    @endpush
