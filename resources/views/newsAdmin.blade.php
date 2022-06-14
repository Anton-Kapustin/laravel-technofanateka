@extends('layouts.app')

  @section('title')
    <title>ADMIN</title>
  @endsection

  @section('navbar')
    <x-layouts.navbar />
  @endsection

  @section('alerts')
    <x-layouts.alerts />
  @endsection

  @section('body')
    <x-news.newsBlock :news=$news route='newsAdmin' />
    <x-pagination :news=$news />

  @endsection

  @section('footer')
    <x-layouts.footer />
  @endsection
