@extends('layouts.admin')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">الخيارات </a>
                                </li>
                                <li class="breadcrumb-item"><a href=""> الخيارات الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item active"> الخيارات تعديل
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form"> تعديل الخيارات رئيسي </h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
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
                                    <div class="card-body">
                                        <form class="form"
                                              action="{{route('storeoption')}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <input name="id" value="" type="hidden">
                                            <div class="form-body">

                                                <h4 class="form-section"><i class="ft-home"></i> بيانات الخيارات  </h4>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> اسم المنتج

                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value=""
                                                                   name="name">
                                                            @error("name")
                                                            <span class="text-danger"> هذا الحقل مطلوب</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> سعر المنتج

                                                            <input type="text" id="price"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value=""
                                                                   name="price">
                                                            @error("price")
                                                            <span class="text-danger"> هذا الحقل مطلوب</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> اختر خيارات المنتج

                                                                    <select name="product_id" class="select2 form-control">
                                                                        <optgroup label="من فضلك اختر المنتج">
                                                                            @if ($product && $product->count() > 0)
                                                                                @foreach ($product as $item)
                                                                                    <option value="{{ $item->id }}">
                                                                                        {{ $item->name }}
                                                                                    </option>
                                                                                @endforeach
                                                                            @endif
                                                                        </optgroup>

                                                                    </select>
                                                                    @error('product_id')
                                                                        <span class="text-danger"> هذا الحقل مطلوب</span>
                                                                    @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> اختر خيارات

                                                                    <select name="attribute_id" class="select2 form-control">
                                                                        <optgroup label="من فضلك اختر الخصائص">
                                                                            @if ($atrribute && $atrribute->count() > 0)
                                                                                @foreach ($atrribute as $item)
                                                                                    <option value="{{ $item->id }}">
                                                                                        {{ $item->name }}
                                                                                    </option>
                                                                                @endforeach
                                                                            @endif
                                                                        </optgroup>

                                                                    </select>
                                                                    @error('atrribute_id')
                                                                        <span class="text-danger"> هذا الحقل مطلوب</span>
                                                                    @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> تراجع
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> تحديث
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>

@endsection
