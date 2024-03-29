@extends('fontend.layouts.master')

@section('content')
    <div class="bg-homepage1"></div>

    @include('fontend.home.sections.hero-section')

    <div class="mt-100"></div>

    @include('fontend.home.sections.category-section')

    @include('fontend.home.sections.futured-section')

    @include('fontend.home.sections.why-choose')

    @include('fontend.home.sections.learn-more')

    @include('fontend.home.sections.counter-section')

    @include('fontend.home.sections.recruiters-section')

    @include('fontend.home.sections.pricing-section')

    @include('fontend.home.sections.job-location')

    @include('fontend.home.sections.client-section')

    @include('fontend.home.sections.news-section')

@endsection
