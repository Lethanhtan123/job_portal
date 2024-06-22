@extends('fontend.layouts.master')

@section('contents')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Trang cá nhân</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="index.html">Home</a></li>
                            <li>Thông tin Ứng viên</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-120">
        <div class="container">
            <div class="row">
                @include('fontend.company-dashboard.sidebar')
                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-2">{{ $jobTitle->title }}</h4>

                        </div>
                        <div class="p-0 card-body">
                            <div class="table-responsive">
                                <table class=" align-middle table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="">Chi tiết</th>
                                            <th>Kinh nghiệm</th>
                                            <th style="">Thao tác</th>
                                        </tr>
                                    </thead>

                                    <tbody class="align-middle">
                                        @forelse ($applications as $item)
                                            <tr>
                                                <td class="align-middle">
                                                    <div class="d-flex align-items-center flex-wrap">
                                                        <a class="d-block">
                                                            <img style="width:50px;height:50px;object-fit:cover;"
                                                                src="{{ asset($item->candidate?->image) }}"
                                                                title="{{ $item->candidate->full_name }}"
                                                                alt="{{ $item->candidate->full_name }}">
                                                        </a>
                                                        <p class="mb-0 ms-2">
                                                            <a class="d-block font-md">
                                                                {{ $item->candidate->full_name }}
                                                            </a>
                                                            <span>{{ $item->candidate->profession->name }}</span>
                                                        </p>
                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="mb-0">{{ $item->candidate->experience->name }}</p>
                                                </td>
                                                <td class="align-middle">
                                                  <a class="font-bold btn btn-apply font-md" href="{{ route('candidates.show',$item->candidate->slug) }}" >Xem hồ sơ</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="12" class="text-center">No result found!</td>
                                            </tr>
                                        @endforelse

                                    </tbody>

                                </table>
                            </div>
                        </div>

                        <div class="paginations">
                            <ul class="pager">
                                @if ($applications->hasPages())
                                    {{ $applications->withQueryString()->links() }}
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
