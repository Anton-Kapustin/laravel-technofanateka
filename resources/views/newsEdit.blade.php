@extends('layouts.app')

@section('title')
  <title>ADMIN</title>
@endsection

  @section('navbar')
    <x-layouts.navbar />
  @endsection

  @section('form')
  <x-form.formBody title='Редактирование новости' >
    <x-slot name="body">
      <x-form.formItems 
      :items=$partOfNews 
      :structure=$structure
      modelForTranslation='News.'
      title='Редактирование новости' 
      route="News.update" />
    </x-slot>
  </x-form.formBody>
  @endsection

  @section('footer')
    <x-layouts.footer />
  @endsection
