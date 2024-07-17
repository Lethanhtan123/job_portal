@extends('admin.layouts.master')

@section('contents')
<section class="section">
    <div class="section-header">
        <h1>Bảng điều kiển</h1>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Tài khoản ứng viên</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalCandidate }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Tài khoản doanh nghiệp</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalCompany }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Tin tức & Sự kiện</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalBlogs }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Tin tuyển dụng</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalJobs }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Tin tuyển dụng còn thời hạn</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalActiveJobs }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Tin tuyển dụng đã hết hạn</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalExpiredJobs }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Tin tuyển dụng đang chờ xử lý</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalPendingJobs }}
                    </div>
                </div>
            </div>
        </div>

        {{-- Lứu ý có mạng chạy mới được --}}

        <div class="mt-3 row gx-2">
            <div class="col-md-6">
                <canvas id="myChart" width="400" height="200"></canvas>
            </div>

            <div class="col-md-6">
                <canvas id="myChart2" width="400" height="200"></canvas>
            </div>

        </div>


</section>

@endsection


@push('scripts')
<script>
    var xValues = @json($topJobCategoriesArray);
    var yValues = @json($yValues);  // Bạn có thể thay đổi giá trị này theo nhu cầu của mình
    var barColors = [
        "#b91d47",
        "#ffc107",
        "#dc3545",
        "#28a745",
        "#007bff"
    ];

    var xValues2 = @json($topCitiesArray);
    var yValues2 = @json($yValues2);  // Bạn có thể thay đổi giá trị này theo nhu cầu của mình
    var barColors2 = [
        "#b91d47",
        "#ffc107",
        "#dc3545",
        "#28a745",
        "#007bff"
    ];

    new Chart("myChart", {
        type: "pie",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            title: {
                display: true,
                text: "World Wide Wine Production 2018"
            }
        }
    });
    new Chart("myChart2", {
        type: "doughnut",
        data: {
            labels: xValues2,
            datasets: [{
                backgroundColor: barColors2,
                data: yValues2
            }]
        },
        options: {
            title: {
                display: true,
                text: "World Wide Wine Production 2018"
            }
        }
    });
</script>

@endpush
