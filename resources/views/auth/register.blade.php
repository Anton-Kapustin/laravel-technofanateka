@extends('layouts.app')

  @section('title')
    <title>Регистрация</title>
  @endsection

  @section('navbar')
    <x-layouts.navbar />
  @endsection

  @section('form')
    <x-auth.register />
  @endsection

  @section('footer')
    <x-layouts.footer />
  @endsection
