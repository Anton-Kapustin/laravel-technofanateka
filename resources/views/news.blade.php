@extends('layouts.app')

  @section('title')
    <title>NEWS</title>
  @endsection

  @section('navbar')
    <x-layouts.navbar />
  @endsection

  @section('body')
    <x-news.newsBlock :news=$news route='news' />
    <x-pagination :news=$news />
  @endsection

  @section('footer')
    <x-layouts.footer />
  @endsection
