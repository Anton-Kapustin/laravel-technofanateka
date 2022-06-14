@extends('layouts.app')

  @section('title')
    <title>HOME</title>
  @endsection

  @section('navbar')
    <x-layouts.navbar />
  @endsection

  @section('body')
    <x-home.home />
  @endsection

  @section('footer')
    <x-layouts.footer />
  @endsection