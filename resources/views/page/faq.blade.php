@extends('layouts.app')
@section('title','Câu hỏi thường gặp')
@section('meta')
<meta name="description" content="faq">
<meta name="keywords" content="faq">
@stop()
@section('main')
<?php

use Carbon\Carbon;
?>
<section>
    <?php
    $br_item = 'FAQ';
    ?>
    @include('page.breadcrumb',['br_item' => $br_item,'data' => ''])
    <!-- bat dau phan FAQ's -->
    <div class="faq">
        <div class="container">
            <div class="col-md-12">
                <div id="accordion">
                    @if(isset($faq))
                    @foreach($faq as $f)
                    <div class="card">
                        <div class="card-header card-faq">
                            <a class="collapsed card-link" data-toggle="collapse" data-target="#collapse-{{$f->id}}" href="#" aria-expanded="false" aria-controls="collapse-{{$f->id}}">
                                {{$f->name}}
                                <i class="fa fa-minus float-right"></i>
                            </a>
                        </div>
                        <div id="collapse-{{$f->id}}" class="collapse show" data-parent="#accordion">
                            <div class="card-body">
                                {!!$f->content!!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- ket thuc phan FAQ's -->
    @include('page.help_box')
</section>
@stop()