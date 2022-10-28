@extends('layouts.app')
@section('title', 'Policies')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 p-4">
            <a class="go-back" href="#">
                <div class="arrow"> Back</div>
            </a>
            <h3 class="lead text-dark mt-5">Our policies</h3>
            <ul>
                <li><a data-toggle="modal" data-target="#returnsModal" href="#">Returns policy</a></li>
                <li><a data-toggle="modal" data-target="#privacyModal" href="#">Privacy policy</a></li>
                <li><a data-toggle="modal" data-target="#termsModal" href="#">Term and conditions</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection
