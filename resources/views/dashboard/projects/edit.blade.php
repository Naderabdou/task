@extends('dashboard.layouts.app')

@section('title', 'تعديل المشروع')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.projects.index') }}">
                                            المشاريع
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#"> {{ $project->name }} تعديل المشروع</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item"
                                    href="{{ route('admin.projects.update',$project->id) }}"><i class="mr-1"
                                        data-feather="check-square"></i><span class="align-middle">تعديل المشروع
                                        </span></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic Vertical form layout section start -->
                <section id="basic-vertical-layouts">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2 class="card-title">{{ $project->name }}</h2>
                                </div>
                                <div class="card-body">
                                    <form class="form form-vertical" id="createBookForm"
                                          action="{{ route('admin.projects.update',$project->id) }}" method="POST"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="select-country">اقسام الخدمات</label>
                                                    <select class="form-control select2" id="select-country" name="category_id">
                                                        <option value="">اختر قسم </option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}" {{$category->id == $project->id ? 'selected' : ''}}>{{ app()->getLocale() == 'ar' ?  $category->name_ar  : $category->name_en}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="name_ar">الاسم باللغه العربيه</label>
                                                    <input type="text" id="name_ar" class="form-control" name="name_ar" required
                                                           value="{{ old('name_ar',$project->name_ar) }}" />
                                                    @error('name_ar')
                                                    <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="name_en">الاسم باللغه الانجليزيه</label>
                                                    <input type="text" id="name_en" class="form-control" name="name_en" required
                                                           value="{{ old('name_en',$project->name_en) }}" />
                                                    @error('name_en')
                                                    <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="desc">الوصف باللغه العربيه</label>
                                                    <textarea class="form-control" name="description_ar" id="description_ar" rows="5">{{ old('description_ar',$project->description_ar) }}</textarea>
                                                    @error('description_ar')
                                                    <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="desc">الوصف باللغه الانجليزيه</label>
                                                    <textarea class="form-control" name="description_en" id="description_en" rows="5">{{ old('description_en',$project->description_en) }}</textarea>
                                                    @error('description_en')
                                                    <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>



                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="units">عدد الوحدادت</label>
                                                    <input type="text" id="units" class="form-control" name="units" required
                                                           value="{{ old('units',$project->units) }}" />
                                                    @error('units')
                                                    <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="building_area">مساحه البناء</label>
                                                    <input type="text" id="building_area" class="form-control" name="building_area" required
                                                           value="{{ old('building_area',$project->building_area) }}" />
                                                    @error('building_area')
                                                    <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="land_area">مساحة الارض</label>
                                                    <input type="text" id="land_area" class="form-control" name="land_area" required
                                                           value="{{ old('land_area',$project->land_area) }}" />
                                                    @error('land_area')
                                                    <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>



                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="name_ar">قطاع المشاريع</label>
                                                    <input type="text" id="name_ar" class="form-control" name="projects_sector" required
                                                           value="{{ old('projects_sector',$project->projects_sector) }}" />
                                                    @error('projects_sector')
                                                    <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="date_created">تاريخ التأسيس</label>
                                                    <input type="text" id="date_created" class="form-control" name="date_created" required
                                                           value="{{ old('date_created',$project->date_created) }}" />
                                                    @error('date_created')
                                                    <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="aesthetic_space">اجمالي  المساحة</label>
                                                    <input type="text" id="aesthetic_space" class="form-control" name="aesthetic_space" required
                                                           value="{{ old('aesthetic_space',$project->aesthetic_space) }}" />
                                                    @error('aesthetic_space')
                                                    <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="project_services">خدمات المشروع</label>
                                                    <input type="text" id="project_services" class="form-control" name="project_services" required
                                                           value="{{ old('project_services',$project->project_services) }}" />
                                                    @error('project_services')
                                                    <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city">المدينة</label>
                                                    <select class="form-control cityEdit select2" id="cityEdit" name="city_id">
                                                        <option value="">اختر المدينه</option>
                                                        @foreach ($cities as $city)

                                                            <option value="{{ $city->id }}" {{$city->id == $project->city_id ? 'selected' : ''}}>{{ app()->getLocale() == 'ar' ?  $city->name_ar  : $city->name_en}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="district">الحي</label>
                                                    <select class="form-control districtEdit select2" id="district" name="district_id">
                                                        <option value="">اختر حي</option>
                                                        @foreach ($districts as $district)

                                                            <option value="{{ $district->id }}" {{$district->id == $project->district_id ? 'selected' : ''}}>{{ app()->getLocale() == 'ar' ?  $district->name_ar  : $district->name_en}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>




                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="formFile" class="form-label">الصوره</label>
                                                    <input class="form-control image" type="file" id="formFile"
                                                           name="image">
                                                    @error('image')
                                                    <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group prev">
                                                    <img src="{{asset('storage/'.$project->image)}}" style="width: 100px"
                                                         class="img-thumbnail preview-formFile" alt="">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="title">العنوان </label>
                                                    <input type="text" style="width: 73%;margin: 12px 0 0;" id="address" name="address" value="{{$project->address}}" class="form-control" aria-label="Name" aria-describedby="basic-addon-name" />
                                                    <div id="map" style="height: 500px;"></div>
                                                    <div class="">
                                                        @if ($errors->has('title'))
                                                            <span class="help-block">
                                <strong style="color: red;">{{ $errors->first('title') }}</strong>
                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <input type="hidden" name="lat" id="lat" value="{{$project->lat}}">

                                            <input type="hidden" name="lng" id="lng" value="{{$project->lng}}">


                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary mr-1">تعديل</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Basic Vertical form layout section end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

    @push('js')
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdarVlRZOccFIGWJiJ2cFY8-Sr26ibiyY&libraries=places&callback=initAutocomplete&language=<?php echo e('ar'); ?>" defer></script>

        <script src="{{ asset('dashboard/app-assets/js/custom/map.js') }}"></script>
        <script src="{{ asset('dashboard/app-assets/js/custom/preview-image.js') }}"></script>

        <script>


            $(document).ready(function() {
                $('#cityEdit').change(function() {
                    var id = $(this).val();

                    $.ajax({
                        url: '/admin/district/' + id ,
                        method: 'GET',
                        success: function(data) {


                            var options = '';
                            if (data.length > 0){
                                for (var i = 0; i < data.length; i++) {
                                    options += '<option value="' + data[i].id +'">' + data[i].name_ar + '</option>';
                                }
                            }else {
                                options += '<option value="">لا يوجد احياء</option>';

                            }

                            $('#district').html(options);
                        }
                    });
                });
            });

            $(document).on('click', '.remove-btn', function(e) {
                e.preventDefault();
                $(this).closest('.row').remove();
            });
            $('.select2').select2({
                dir: "rtl",
                language: "ar",
                placeholder: "اختر قسم",
                allowClear: true,
                width: '100%'
            });
            $('.cityEdit').select2({
                dir: "rtl",
                language: "ar",
                placeholder: "اختر المدينه الخاص بك",
                allowClear: true,
                width: '100%'
            });
            $('.districtEdit').select2({
                dir: "rtl",
                language: "ar",
                placeholder: "اختر الحي الخاص بك",
                allowClear: true,
                width: '100%'
            });
            $('.add-btn').click(function(e) {
                e.preventDefault();
                var content = `<div class="row my-2">
                                    <div class="col-md-8">
                                        <input type="text" name="keywords[]"
                                            class="form-control"
                                            value="">
                                    </div>
                                    <div class="col-md-4">
                                        <a class="btn btn-danger remove-btn">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </div>
                                </div>`;
                $(this).parent().prepend(content);
            });
        </script>
    @endpush
@endsection
