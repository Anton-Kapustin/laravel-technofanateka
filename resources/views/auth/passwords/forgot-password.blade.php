@extends('layouts.app')

  @section('title')
    <title>Forgot Password</title>
  @endsection

  @section('navbar')
    <x-layouts.navbar />
  @endsection

  @section('body')
    <x-auth.forgot-password />
  @endsection

  @section('footer')
    <x-layouts.footer />
  @endsection
