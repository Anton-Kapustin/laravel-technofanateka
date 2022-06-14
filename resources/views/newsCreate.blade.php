@extends('layouts.app')

  @section('title')
    <title>ADMIN</title>
  @endsection

  @section('navbar')
    <x-layouts.navbar />
  @endsection

  @section('form')
  <x-form.formBody title='Добавить новость' >
    <x-slot name="body">
      <x-form.formNewsCreate title='Добавление новости' :structure=$structure route='News.store' />
    </x-slot>
  </x-form.formBody>


  @endsection

  @section('footer')
    <x-layouts.footer />
  @endsection
