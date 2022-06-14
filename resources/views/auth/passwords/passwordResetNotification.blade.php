@extends('layouts.app')

  @section('title')
    <title>Reset Password</title>
  @endsection

  @section('body')
    <x-auth.passwordResetNotification :name=$name :url=$url />
  @endsection

  @section('footer')
    <x-layouts.footer />
  @endsection
