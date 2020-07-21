@extends('layouts.admin')
@section('title','error')
@section('main')
<?php
$code = isset($code) ? $code : 404;
$title = isset($title) ? $title : 'Not found';
$message = isset($message) ? $message : 'Page not found';
?>
<div class="jumbotron">
    <h1 class="display-3">{{$code}}, {{$title}}</h1>
    <p class="lead">{{$message}}</p>
</div>
@stop()