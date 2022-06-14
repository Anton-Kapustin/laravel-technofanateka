@extends('layouts.app')

  @section('title')
    <title>Reset Password</title>
  @endsection

  @section('navbar')
    <x-layouts.navbar />
  @endsection

  @section('body')
    <x-auth.reset-password 
      :token=$token
    />
  @endsection

  @section('footer')
    <x-layouts.footer />
  @endsection
