@extends('layouts.app')

@section('title')
  <title>ADMIN</title>
@endsection

  @section('navbar')
    <x-layouts.navbar />
  @endsection

  @section('form')
    <x-form.formBody title='Добавление новой сборки' >
      <x-slot name="body">
        <x-form.formCreateAssemble
    	    :arrayWithAccessories=$arrayWithAccessories 
    	    modelForTranslation='Accessory.'
    	    :formAction=$formAction
        />
      </x-slot>
    </x-form.formBody>
  @endsection

  @section('footer')
    <x-layouts.footer />
  @endsection