@extends('fontend.layouts.master')
@section('contents')
<section class="section-box mt-75">
    <div class="breacrumb-cover">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <h2 class="mb-20">Nhà Tuyển Dụng</h2>
                    <ul class="breadcrumbs">
                        <li><a class="home-icon" href="index.html">Home</a></li>
                        <li>Nhà Tuyển Dụng</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-box mt-120">
    <div class="container">
        <div class="flex-row-reverse row">
            <div class="float-right col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="content-page company_page">
                    <div class="row">
                        @forelse ($companies as $item)
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                            <div class="card-grid-1 hover-up wow animate__animated animate__fadeIn">
                                <div class="image-box"><a href="{{ route('companies.show',$item->slug) }}"><img
                                            src="{{ asset($item->logo) }}" alt="joblist"></a></div>
                                <div class="mt-10 info-text">
                                    <h5 class="mb-1 font-bold"><a href="{{ route('companies.show',$item->slug) }}">{{
                                            $item->name }}</a></h5>

                                    <span class="card-location">{{ formatLocation(
                                        $item->companyCountry->name,
                                        // $item->companyState->name

                                        ) }}</span>
                                    <div class="mt-30"><a class="btn btn-grey-big"
                                            href="{{ route('companies.show', $item->slug) }}"><span>{{ $item->jobs_count
                                                }}</span><span> Tin tuyển dụng</span></a></div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <h5 class="text-center">Tiếc quá không tìm thấy dữ liệu! 😥</h5>
                        @endforelse

                    </div>
                </div>
                <div class="paginations">
                    <ul class="pager">
                        @if ($companies->hasPages())
                        {{ $companies->withQueryString()->links() }}
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="sidebar-shadow none-shadow mb-30 cus_sidebar">
                    <div class="sidebar-filters">
                        <div class="filter-block head-border mb-30">
                            <h5>Tìm kiếm nhanh <a class="link-reset" href="{{ route('companies.index') }}">Tạo lại</a></h5>
                        </div>

                        <form action="{{ route('companies.index') }}" method="GET">
                            <div class="mb-20 filter-block">
                                <div class="form-group ">
                                    <input type="text" value="{{ request()?->search }}" class="form-control"
                                        name="search" placeholder="Nhập từ khóa ...">
                                </div>
                            </div>
                            <div class="mb-20 filter-block">
                                <div class="form-group select-style">
                                    <select name="country" class="form-control country form-icons select-active">
                                        <option value="">Quốc gia</option>
                                        @foreach ($countries as $country)
                                        <option @selected(request()?->country == $country->id) value="{{ $country->id
                                            }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-20 filter-block">
                                <div class="form-group select-style">
                                    <select name="city" class="city form-control form-icons select-active">
                                        @if ($selectedCites)
                                        <option value="">All</option>
                                        @foreach ($selectedCites as $item)
                                        <option @selected($item->id == request()->city) value="{{ $item->id }}" >{{
                                            $item->name }}</option>
                                        @endforeach
                                        @else
                                        <option value="">Thành phố</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="mb-20 filter-block">
                                <div class="form-group select-style">
                                    <select name="district" class="district form-control form-icons select-active">
                                        @if ($selectedDistricts)
                                        <option value="">All</option>

                                        @foreach ($selectedDistricts as $item)
                                        <option @selected($item->id == request()->city) value="{{ $item->id }}" >{{
                                            $item->name }}</option>
                                        @endforeach
                                        @else
                                        <option value="">Quận,huyện</option>
                                        @endif
                                    </select>
                                    <button class="mt-10 submit btn btn-default rounded-1 w-100"
                                        type="submit">Search</button>
                                </div>
                            </div>
                        </form>


                        <form action="">
                            <div class="mb-20 filter-block">
                                <h5 class="medium-heading mb-15">Industry</h5>
                                <div class="form-group">
                                  <ul class="list-checkbox">
                                    <li class="active">
                                        <label class="d-flex">
                                          <input type="radio" name="industry" class="x-radio" value=""><span class="text-small">All</span>
                                        </label>
                                    </li>
                                    @foreach ($industryTypes as $type)
                                    <li class="active">
                                      <label class="d-flex">
                                        <input type="radio" @checked($type->slug == request()->industry) name="industry" class="x-radio" value="{{ $type->slug }}">
                                        <span class="text-small">{{ $type->name }}</span>
                                        <span class="number-item">{{ $type->companies_count }}</span>
                                      </label>
                                    </li>
                                    @endforeach

                                  </ul>
                                </div>
                              </div>

                              <button class="mt-10 submit btn btn-default rounded-1 w-100"
                                        type="submit">Search</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>

$(document).ready(function() {
        $('.country').on('change', function() {
            let country_id = $(this).val();

            $.ajax({
                mehtod: 'GET',
                url: '{{ route("get-cities", ":id") }}'.replace(":id", country_id),
                data: {},
                success: function(response) {
                    let html = '';

                    $.each(response, function(index, value) {
                        html += `<option value="${value.id}" >${value.name}</option>`
                    });

                    html = `<option value="" >Choose</option>` + html;

                    $('.city').html(html);

                },
                error: function(xhr, status, error) {

                }
            })
        })
    });

    $(document).ready(function() {
        $('.city').on('change', function() {
            let city_id = $(this).val();

            $.ajax({
                mehtod: 'GET',
                url: '{{ route("get-districts", ":id") }}'.replace(":id", city_id),
                data: {},
                success: function(response) {
                    let html = '';

                    $.each(response, function(index, value) {
                        html += `<option value="${value.id}" >${value.name}</option>`
                    });

                    html = `<option value="" >Choose</option>` + html;

                    $('.district').html(html);

                },
                error: function(xhr, status, error) {

                }
            })
        })
    });

</script>
@endpush

