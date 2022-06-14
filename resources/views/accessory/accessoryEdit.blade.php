@extends('layouts.app')

@section('title')
  <title>ADMIN</title>
@endsection

  @section('navbar')
    <x-layouts.navbar />
  @endsection

  @section('form')
  <x-form.formBody title='Редактирование комплектующего' >
    <x-slot name="body">
      <x-form.formEditAccessory
        :items=$accessory 
        modelForTranslation='Accessory.'
        title='Редактирование комплектующего' 
        :formAction=$formAction 
      />
    </x-slot>
  </x-form.formBody>


  @endsection

  @section('footer')
    <x-layouts.footer />
  @endsection