@extends('layouts.admin')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item active">تعديل الملف الشخصي
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
                                    <h4 class="card-title" id="basic-layout-form"> تعديل الملف الشخصي </h4>
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
                                    <div class="card-body">
                                        <form class="form"
                                            action="{{ route('updateprofile')}}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            {{-- <input type="hidden" name="id" value="{{ $vendor->id }}">

                                            <input type="hidden" value="{{ $vendor->latitude }}" id="latitude"
                                                name="latitude">
                                            <input type="hidden" value="{{ $vendor->longitude }}" id="longitude"
                                                name="longitude"> --}}

                                            {{-- <div class="form-group">
                                                <div class="text-center">
                                                    <img src="{{ $vendor->logo }}" class="rounded-circle  height-250"
                                                        alt="صورة القسم  ">
                                                </div> --}}
                                    </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1"> الاسم </label>
                                                    <input type="text" value="{{ $admin->name }}" id="name"
                                                        class="form-control" placeholder="  " name="name">
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1"> البريد الإلكتروني </label>
                                                    <input type="text" value="{{ $admin->email }}" id="email"
                                                        class="form-control" placeholder="  " name="email">

                                                    @error('email')

                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <input type="hidden" value="{{ $admin->id }}" id="id"
                                                        class="form-control" placeholder="  " name="id">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1"> كلمة المرور </label>
                                                    <input type="password" value="{{ $admin->password }}" id="password"
                                                        class="form-control" placeholder="  " name="password">

                                                    @error('password')

                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <input type="hidden" value="{{ $admin->id }}" id="id"
                                                        class="form-control" placeholder="  " name="id">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1"> تأكيد كلمة المرور</label>
                                                    <input type="password" value="{{ $admin->confirmpassword }}" id="password"
                                                        class="form-control" placeholder="  " name="password_confirmation">

                                                    @error('password_confirmation')

                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <input type="hidden" value="{{ $admin->id }}" id="id"
                                                        class="form-control" placeholder="  " name="id">
                                                </div>
                                            </div>
                                        </div>

                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="la la-check-square-o"></i> حفظ
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
