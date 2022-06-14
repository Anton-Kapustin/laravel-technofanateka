@extends('layouts.app')

  @section('title')
    <title>Вход</title>
  @endsection

  @section('navbar')
    <x-layouts.navbar />
  @endsection

  @section('form')
    <x-auth.login />
  @endsection

  @section('footer')
    <x-layouts.footer />
  @endsection
