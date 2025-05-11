@extends('admin.layouts.master')

@section('head-tag')
    <title>گالری</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> گالری</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویدیو
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.market.video.create', $product->id) }}" class="btn btn-info btn-sm">ایجاد ویدیو جدید </a>
                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </div>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover h-150px">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام کالا</th>
                            <th> ویدیو کالا</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($product->videos as $video)

                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $video->name }}</td>
                                <td>
                                </td>

                                <td class="width-16-rem text-left">
                                    <a href="{{ route('admin.market.video.edit', ['video' => $video->id,'product' => $product->id ] ) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                    <form class="d-inline" action="{{ route('admin.market.video.destroy', ['product' => $product->id , 'video' => $video->id] ) }}" method="post">
                                        @csrf
                                        {{ method_field('delete') }}
                                        <button class="btn btn-danger btn-sm delete" type="submit"><i class="fa fa-trash-alt"></i> حذف</button>
                                    </form>

                                </td>
                            </tr>

                        @endforeach


                        </tbody>
                    </table>
                </section>

            </section>
        </section>
    </section>

@endsection


@section('script')

    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])


@endsection
