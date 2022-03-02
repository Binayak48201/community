@extends('layouts.app')

@section('content')

    <replies-view :post="{{ $post }}"></replies-view>

@endsection
