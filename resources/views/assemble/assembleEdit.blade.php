@extends('layouts.app')

@section('title')
  <title>ADMIN</title>
@endsection

  @section('navbar')
    <x-layouts.navbar />
  @endsection

  @section('form')
    <x-form.formBody title='Редактирование сборки' >
      <x-slot name="body">
        <x-form.formEditAssemble
    	    :arrayWithAccessories=$arrayWithAccessories 
          :assemble=$assemble
    	    modelForTranslation='Accessory.'
    	    :formAction=$formAction
        />
      </x-slot>
    </x-form.formBody>
  @endsection

  @section('footer')
    <x-layouts.footer />
  @endsection