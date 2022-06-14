@extends('layouts.app')

@section('title')
  <title>ADMIN</title>
@endsection

  @section('navbar')
    <x-layouts.navbar />
  @endsection

  @section('form')
  <x-form.formBody title='Добавление комплектующего' >
    <x-slot name="body">
      <x-form.formCreateAccessory
        :arrayWithColumns=$arrayWithColumns 
        modelForTranslation='Accessory.'
        title='Добавление комплектующего' 
        :formAction=$formAction
      />
    </x-slot>
  </x-form.formBody>


  @endsection

  @section('footer')
    <x-layouts.footer />
  @endsection