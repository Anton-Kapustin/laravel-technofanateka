@extends('layouts.app')

  @section('title')
    <title>ERROR</title>
  @endsection

  @section('navbar')
    @include('include.navbar')
  @endsection

  @section('body')
    @include('include.error')
  @endsection

  @section('footer')
    @include('include.footer')
  @endsection
