@extends('layouts.app')

  @section('title')
    <title>NEWS</title>
  @endsection

  @section('navbar')
    <x-layouts.navbar />
  @endsection

  @section('body')
    <x-news.cardPartOfNews :partOfNews=$partOfNews />
  @endsection

  @section('footer')
    <x-layouts.footer />
  @endsection