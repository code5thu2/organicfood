@extends('layouts.app')
@section('main')
<?php

use Carbon\Carbon;
?>
<section>
    <?php
    $br_item = 'Liên hệ';
    ?>
    @include('page.breadcrumb',['br_item' => $br_item,'data' => ''])
    <!-- bat dau phan contact -->
    <div class="contact-us">
        <div class="address">
            <div class="container">
                <div class="logo-ct">
                    <img src="{{url('public')}}/app/images/logo/main-logo-2.png" class="img-ct">
                </div>
                <div class="main-address text-center">
                    <div class="row">
                        <div class="col-lg-4 col-md-12">
                            <div class="box-ct">
                                <div class="icon-ct">
                                    <img src="{{url('public')}}/app/images/icon/location-icon.png" class="img-ct">
                                </div>
                                <div class="tit-ct text-center">
                                    <h3>address</h3>
                                    <p>63739 Street, Lorem Ipsum<br>Dolor132/B. City, Country</p>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="box-ct">
                                <div class="icon-ct">
                                    <img src="{{url('public')}}/app/images/icon/phone-icon.png" class="img-ct">
                                </div>
                                <div class="tit-ct text-center">
                                    <h3>Phone</h3>
                                    <p>+84 0399817137</p>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="box-ct">
                                <div class="icon-ct">
                                    <img src="{{url('public')}}/app/images/icon/message-icon.png" class="img-ct">
                                </div>
                                <div class="tit-ct text-center">
                                    <h3>Email</h3>
                                    <p>levietanhtdvp@gmail.com</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end-address -->
        <div class="map-form">
            <div class="col-md-6 form-sub-ct">
                <div class="main-form">
                    <div class="tit-sb-ct text-center">
                        <h3><span>get in touch</span> with us</h3>
                    </div>
                    <form action="{{route('home.submit_feedback')}}" method="POST">
                        @csrf
                        <div class="form-group col-sm-12 col-xs-12">
                            <input type="text" class="form-control @error('name') border-danger @enderror" name="name" value="{{old('name')}}" placeholder="Name">
                            @error('name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-sm-12 col-xs-12">
                            <input type="text" class="form-control @error('email') border-danger @enderror" name="email" value="{{old('email')}}" placeholder="Email">
                            @error('email')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-sm-12 col-xs-12">
                            <input type="text" class="form-control @error('phone') border-danger @enderror" name="phone" value="{{old('phone')}}" placeholder="Phone">
                            @error('phone')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-sm-12 col-xs-12">
                            <textarea class="form-control @error('content') border-danger @enderror" name="content" value="{{old('content')}}" placeholder="Feedback..."></textarea>
                            @error('content')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-sm-12 col-xs-12">
                            <button class="submit">Submit</button>
                        </div>
                    </form>
                </div> <!-- end-main-form -->
            </div> <!-- end-col -->
            <div class="col-md-6">
                <div class="google-site">
                </div>
            </div>
        </div> <!-- end-map-form  -->
    </div>
    <!-- kt phan contact -->
    @include('page.help_box')
</section>
@stop()