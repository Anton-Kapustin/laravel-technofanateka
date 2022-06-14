@extends('layouts.app')

  @section('title')
    <title>Contacts</title>
  @endsection

  @section('navbar')
    <x-layouts.navbar />
  @endsection

  @section('body')
    <x-card-contacts />
  @endsection

  @section('footer')
    <x-layouts.footer />
  @endsection