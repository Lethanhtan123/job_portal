@extends('fontend.layouts.master')
@section('contents')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Trang cá nhân</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ route('home') }}">Trang chủ</a></li>
                            <li>Hồ sơ</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-120">
        <div class="container">
            <div class="row">
                @include('fontend.candidate-dashboard.sidebar')
                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">

                    <ul class="mb-3 nav nav-pills nav-cus" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Thông tin</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">Hồ sơ</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-experience-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-experience" type="button" role="tab"
                                aria-controls="pills-experience" aria-selected="false">Kinh nghiệm & Bằng cấp</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-account-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-account" type="button" role="tab" aria-controls="pills-account"
                                aria-selected="false">Cài đặt tài khoản</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        @include('fontend.candidate-dashboard.profile.sections.basic-sections')
                        @include('fontend.candidate-dashboard.profile.sections.profile-sections')
                        @include('fontend.candidate-dashboard.profile.sections.experience-sections')
                        @include('fontend.candidate-dashboard.profile.sections.account-sections')
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- experience --}}
    <div class="modal fade" id="experienceModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Thêm Kinh nghiệm</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="" id="experience-form">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Công ty *</label>
                                    <input type="text" required="" class="form-control" name="company" id="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Phòng *</label>
                                    <input type="text" required class="form-control" name="department" id="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Chức vụ *</label>
                                    <input type="text" required class="form-control" name="designation" id="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Ngày bắt đầu *</label>
                                    <input type="text" required class="form-control datepicker" name="start"
                                        id="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Ngày kết thúc *</label>
                                    <input type="text" class="form-control datepicker" required name="end"
                                        id="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group form-check form-check-inline">
                                    <input type="checkbox" value="1" class=" form-check-input me-3 "
                                        name="currently_working" id="">
                                    <label class=" form-check-label" for="">Hiện tại vẫn đang làm.</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Trách nhiệm</label>
                                    <textarea maxlenght="500" class="form-control" name="responsibilities" id=""></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end align-items-center">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    {{-- education --}}
    <div class="modal fade" id="educationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Thêm Bằng cấp</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="" id="education-form">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Bằng cấp *</label>
                                    <input type="text" required class="form-control" name="degree" id="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Bậc *</label>
                                    <input type="text" required="" class="form-control" name="level"
                                        id="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Năm hoàn thành *</label>
                                    <input type="text" required class="form-control yearpicker" name="year"
                                        id="">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Ghi chú</label>
                                    <textarea maxlenght="500" class="form-control" name="note" id=""></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end align-items-center">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var editId = "";
        var editMode = false;

        // fetch experience
        function fetchExperience() {
            $.ajax({
                method: 'GET',
                url: "{{ route('candidate.experience.index') }}",
                data: {},
                success: function(response) {
                    $('.experience-tbody').html(response);
                },
                error: function(xhr, status, error) {
                    console.log(error)
                }
            })
        }

        // Save experience data
        $('#experience-form').on('submit', function(event) {
            event.preventDefault();
            const formData = $(this).serialize();


            if (editMode) {
                $.ajax({
                    method: 'PUT',
                    url: "{{ route('candidate.experience.update', ':id') }}".replace(':id', editId),
                    data: formData,
                    beforeSend: function() {
                        showLoader();
                    },

                    success: function(response) {
                        fetchExperience();

                        $('#experience-form').trigger("reset");
                        $('#experienceModal').modal('hide');
                        editId = "";
                        editMode = false;
                        hideLoader();
                        notyf.success(response.message);
                    },
                    error: function(xhr, status, error) {
                        console.log(error)
                    },


                })
            } else {
                $.ajax({
                    method: 'POST',
                    url: "{{ route('candidate.experience.store') }}",
                    data: formData,
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(response) {
                        fetchExperience();
                        $('#experience-form').trigger("reset");
                        $('#experienceModal').modal('hide');

                        hideLoader();
                        notyf.success(response.message);
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                        hideLoader();
                    }
                })
            }

        });

        $('body').on('click', '.edit-experience', function() {
            $('#experience-form').trigger("reset");

            let url = $(this).attr('href');

            $.ajax({
                method: 'GET',
                url: url,
                data: {},

                beforeSend: function() {
                    showLoader();
                },

                success: function(response) {
                    editId = response.id
                    editMode = true;

                    $.each(response, function(index, value) {
                        $(`input[name="${index}"]:text`).val(value);
                        if (index === 'currently_working' && value == 1) {
                            $(`input[name="${index}"]:checkbox`).prop('checked', true);
                        }
                        if (index === 'responsibilities') {
                            $(`textarea[name="${index}"]`).val(value);
                        }
                    })
                    hideLoader();
                },
                error: function(xhr, status, error) {
                    console.log(error);
                    //hideLoader();
                }
            })
        })

        // Delete experience item
        $("body").on('click', '.delete-experience', function(e) {
            e.preventDefault();

            let url = $(this).attr('href');

            Swal.fire({
                title: "Bạn có chắc chắn muốn xóa?",
                text: "Bạn sẽ không thể khôi phục lại!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Đồng ý",
            cancelButtonText: "Đóng",
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        method: 'DELETE',
                        url: url,
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        beforeSend: function() {
                            showLoader();
                        },
                        success: function(response) {
                            fetchExperience();
                            hideLoader();
                            notyf.success(response.message);
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr);
                            swal(xhr.responseJSON.message, {
                                icon: 'error',
                            });
                            hideLoader();
                        }
                    })
                }
            });
        });

        function fetchEducation() {
            $.ajax({
                method: 'GET',
                url: "{{ route('candidate.education.index') }}",
                data: {},
                success: function(response) {
                    $('.education-tbody').html(response);
                },
                error: function(xhr, status, error) {
                    console.log(error)
                }
            })
        }

        // Save education data
        $('#education-form').on('submit', function(event) {
            event.preventDefault();
            const formData = $(this).serialize();

            if (editMode) {
                $.ajax({
                    method: 'PUT',
                    url: "{{ route('candidate.education.update', ':id') }}".replace(':id', editId),
                    data: formData,
                    beforeSend: function() {
                        showLoader();
                    },

                    success: function(response) {
                        fetchEducation();

                        $('#education-form').trigger("reset");
                        $('#educationModal').modal('hide');
                        editId = "";
                        editMode = false;
                        hideLoader();
                        notyf.success(response.message);
                    },
                    error: function(xhr, status, error) {
                        console.log(error)
                    },


                })
            } else {
                $.ajax({
                    method: 'POST',
                    url: "{{ route('candidate.education.store') }}",
                    data: formData,
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(response) {
                        fetchEducation();
                        $('#education-form').trigger("reset");
                        $('#educationModal').modal('hide');

                        hideLoader();
                        notyf.success(response.message);
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                        hideLoader();
                    }
                })
            }

        });

        $('body').on('click', '.edit-education', function() {
            $('#education-form').trigger("reset");

            let url = $(this).attr('href');

            $.ajax({
                method: 'GET',
                url: url,
                data: {},

                beforeSend: function() {
                    showLoader();
                },

                success: function(response) {
                    editId = response.id
                    editMode = true;

                    $.each(response, function(index, value) {
                        $(`input[name="${index}"]:text`).val(value);

                        if (index === 'note') {
                            $(`textarea[name="${index}"]`).val(value);
                        }
                    })
                    hideLoader();
                },
                error: function(xhr, status, error) {
                    console.log(error);
                    hideLoader();
                }
            })
        })

        // Delete education item
        $("body").on('click', '.delete-education', function(e) {
            e.preventDefault();

            let url = $(this).attr('href');

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        method: 'DELETE',
                        url: url,
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        beforeSend: function() {
                            showLoader();
                        },
                        success: function(response) {
                            fetchEducation();
                            hideLoader();
                            notyf.success(response.message);
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr);
                            swal(xhr.responseJSON.message, {
                                icon: 'error',
                            });
                            hideLoader();

                        }
                    })
                }
            });
        });
    </script>
@endpush
