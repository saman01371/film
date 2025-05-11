@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد فیلم</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">فیلم </a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد فیلم</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد فیلم
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.market.product.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.market.product.store') }}" method="post" enctype="multipart/form-data" id="form">
                        @csrf
                        <section class="row">

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">نام فیلم</label>
                                    <input type="text" name="name" value="{{ old('name') }}"class="form-control form-control-sm">
                                </div>
                                @error('name')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="duration">زمان فیلم</label>
                                    <input type="text" name="duration" value="{{ old('duration') }}"class="form-control form-control-sm">
                                </div>
                                @error('duration')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>


                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">انتخاب دسته</label>
                                    <select name="category_id" id="" class="form-control form-control-sm">
                                        <option value="">دسته را انتخاب کنید</option>
                                        @foreach ($productCategories as $productCategory)
                                            <option value="{{ $productCategory->id }}" @if(old('category_id') == $productCategory->id) selected @endif>{{ $productCategory->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                @error('category_id')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>




                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">انتخاب سال انتشار</label>
                                    <select name="year_id" id="" class="form-control form-control-sm">
                                        <option value="">سال انتشار را انتخاب کنید</option>
                                        @foreach ($years as $year)
                                            <option value="{{ $year->id }}" @if(old('year_id') == $year->id) selected @endif>{{ $year->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                @error('year_id')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">انتخاب زبان</label>
                                    <select name="language_id" id="" class="form-control form-control-sm">
                                        <option value="">زبان را انتخاب کنید</option>
                                        @foreach ($languages as $language)
                                            <option value="{{ $language->id }}" @if(old('language_id') == $language->id) selected @endif>{{ $language->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                @error('language_id')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="image">تصویر </label>
                                    <input id="image" type="file" name="image" class="form-control form-control-sm">
                                </div>
                                @error('image')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="video">تیزر </label>
                                    <input id="video" type="file" name="video" class="form-control form-control-sm">
                                </div>
                                @error('video')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="video_path">فیلم اصلی </label>
                                    <input type="file" name="video_path" id="video_path" class="form-control form-control-sm">
                                </div>
                                @error('video_path')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>




                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">قیمت فیلم</label>
                                    <input type="text" name="price" value="{{ old('price') }}" class="form-control form-control-sm">
                                </div>
                                @error('price')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>

                            <section class="col-12">
                                <div class="form-group">
                                    <label for="">خلاصه داستان</label>
                                    <textarea  id="introduction" name="summary" class="form-control form-control-sm" rows="6">{{ old('summary') }}</textarea>
                                </div>
                                @error('summary')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>

                            <section class="col-12">
                                <div class="form-group">
                                    <label for=""> داستان</label>
                                    <textarea  id="story" name="story" class="form-control form-control-sm" rows="6">{{ old('story') }}</textarea>
                                </div>
                                @error('story')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>

                            <section class="col-12">
                                <div class="form-group">
                                    <label for=""> بازیگران</label>
                                    <textarea  id="director" name="director" class="form-control form-control-sm" rows="6">{{ old('director') }}</textarea>
                                </div>
                                @error('director')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>


                            <section class="col-12">
                                <div class="form-group">
                                    <label for=""> کارگردان</label>
                                    <textarea  id="actors" name="actors" class="form-control form-control-sm" rows="6">{{ old('actors') }}</textarea>
                                </div>
                                @error('actors')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="tags">تگ ها</label>
                                    <input type="hidden" class="form-control form-control-sm"  name="tags" id="tags" value="{{ old('tags') }}">
                                    <select class="select2 form-control form-control-sm" id="select_tags" multiple>

                                    </select>
                                </div>
                                @error('tags')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>


                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="status">وضعیت</label>
                                    <select name="status" id="" class="form-control form-control-sm" id="status">
                                        <option value="0" @if(old('status') == 0) selected @endif>غیرفعال</option>
                                        <option value="1" @if(old('status') == 1) selected @endif>فعال</option>
                                    </select>
                                </div>
                                @error('status')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>


                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">تاریخ انتشار</label>
                                    <input type="text" name="published_at" id="published_at" class="form-control form-control-sm d-none">
                                    <input type="text" id="published_at_view" class="form-control form-control-sm">
                                </div>
                                @error('published_at')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>






                            <section class="col-12">
                                <button class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                        </section>
                    </form>
                </section>

            </section>
        </section>
    </section>

@endsection


@section('script')

    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>
    <script>
        CKEDITOR.replace('story');
        CKEDITOR.replace('summary');
        CKEDITOR.replace('director');
        CKEDITOR.replace('actors');
    </script>

    <script>
        $(document).ready(function () {
            $('#published_at_view').persianDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#published_at'
            })
        });
    </script>

    <script>
        $(document).ready(function () {
            var tags_input = $('#tags');
            var select_tags = $('#select_tags');
            var default_tags = tags_input.val();
            var default_data = null;

            if(tags_input.val() !== null && tags_input.val().length > 0)
            {
                default_data = default_tags.split(',');
            }

            select_tags.select2({
                placeholder : 'لطفا تگ های خود را وارد نمایید',
                tags: true,
                data: default_data
            });
            select_tags.children('option').attr('selected', true).trigger('change');


            $('#form').submit(function ( event ){
                if(select_tags.val() !== null && select_tags.val().length > 0){
                    var selectedSource = select_tags.val().join(',');
                    tags_input.val(selectedSource)
                }
            })
        })
    </script>

    <script>
        $(function(){
            $("#btn-copy").on('click', function(){
                var ele = $(this).parent().prev().clone(true);
                $(this).before(ele);
            })
        })
    </script>

@endsection
