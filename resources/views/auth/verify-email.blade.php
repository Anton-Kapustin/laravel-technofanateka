@extends('layouts.app')

  @section('title')
    <title>NEWS</title>
  @endsection

  @section('navbar')
    <x-layouts.navbar />
  @endsection

  @section('body')
    <x-auth.verify-email />
  @endsection

  @section('footer')
    <x-layouts.footer />
  @endsection
