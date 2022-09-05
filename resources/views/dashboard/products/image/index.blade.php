@extends('layouts.admin')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> المنتجات الرئيسية </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('indexgeneral.products') }}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active">  المنتجات المعروضة
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">جميع المنتجات </h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                                @include('dashboard.includes.alerts.success')
                                @include('dashboard.includes.alerts.errors')

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead class="">
                                                <tr>
                                                    <th>المنتج</th>
                                                    <th>الرابط</th>
                                                    <th>وصف</th>
                                                    <th>وصف مختصر</th>
                                                    <th>الحالة</th>
                                                    <th>العلامة التجارية</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @isset($product)
                                                    @foreach ($product as $item)
                                                        <tr>
                                                            <td>{{ $item->name }}</td>
                                                            <td>{{ $item->slug }}</td>
                                                            <td>{{ $item->description }}</td>
                                                            <td>{{ $item->short_description }}</td>
                                                            <td>{{$item -> getActive()}}</td>
                                                            <td>{{$item->brand->name ?? '-'}}</td>
                                                            <td>
                                                                <div class="container"
                                                                    aria-label="Basic example">
                                                                    <a href="{{ route('editptoduct', $item->id) }}"
                                                                        class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>


                                                                    <a href="{{ route('deleteproduct', $item->id) }}"
                                                                        class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>
                                                                    </td>


                                                                    {{-- <a href="{{ route('admin.category.status', $category->id) }}"
                                                                        class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">
                                                                        @if ($category->active == 0)
                                                                            تفعيل
                                                                        @else
                                                                            الغاء تفعيل
                                                                        @endif
                                                                    </a> --}}


                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endisset


                                            </tbody>
                                        </table>
                                        <div class="justify-content-center d-flex">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
