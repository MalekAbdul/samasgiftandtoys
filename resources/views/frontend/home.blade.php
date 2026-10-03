@extends('layouts.frontend')

@section('title', $title)
@section('description', $description)

@section('content')
    @include('components.home.hero')
    @include('components.home.category-grid')
    @include('components.home.featured-products')
    @include('components.home.occasions')
    @include('components.home.promotional-banner')
    @include('components.home.trust-pillars')
    @include('components.home.customer-reviews')
    @include('components.home.newsletter')
@endsection
