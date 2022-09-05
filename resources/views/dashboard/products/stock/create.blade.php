@extends('layouts.admin')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div clas-s="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">الاستوك داخل المخزن </a>
                                </li>
                                <li class="breadcrumb-item"><a href=""> الأستوك </a>
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
                                    <h4 class="card-title" id="basic-layout-form"> تعديل ستوك رئيسي </h4>
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
                                              action="{{route('updatestock')}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <input name="id" value="{{$id}}" type="hidden">



                                            <div class="form-body">

                                                <h4 class="form-section"><i class="ft-home"></i>  المنتج </h4>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> كود المنتج

                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   placeholder=""
                                                                   value=""
                                                                   name="sku">
                                                            @error("sku")
                                                            <span class="text-danger"> هذا الحقل مطلوب</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> الكمية المتواجدة
                                                                  <select class="form-control" name="manage_stock" id="mangeStock">
                                                                    <option value="1">إتاحة الكمية</option>
                                                                    <option value="0" selected>عدم إتاحة الكمية</option>
                                                                  </select>
                                                                </div>
                                                            @error("manage_stock")
                                                            <span class="text-danger"> هذا الحقل مطلوب</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-3" style="display:none" id="qtyDiv">

                                                            <div class="form-group">
                                                                <label for="projectinput1"> الكمية

                                                                <input type="text" id="name"
                                                                       class="form-control"
                                                                       placeholder=""
                                                                       value=""
                                                                       name="qty">
                                                                @error("qty")
                                                                <span class="text-danger"> هذا الحقل مطلوب</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> حالة المنتج
                                                                  <select class="form-control" name="in_stock" id="">
                                                                    <option value="1">موجود </option>
                                                                    <option value="0">غير موجود</option>
                                                                  </select>
                                                                </div>

                                                            @error("in_stock")
                                                            <span class="text-danger"> هذا الحقل مطلوب</span>
                                                            @enderror
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
@section('script')
<script>
$(document).on('change','#mangeStock',function(){
    if ($(this).val()==1) {
        $('#qtyDiv').show();
    }
    else{
        $('#qtyDiv').hide();
    }

});
</script>
@stop
