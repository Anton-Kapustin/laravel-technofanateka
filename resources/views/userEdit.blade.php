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
          :items=$userModel 
          :structure=$structure 
          :selectItems=$selectItems
          modelForTranslation='User.'
          title='Редактирование профиля' 
          route="User.update" />
      </x-slot>
    </x-form.formBody>
  @endsection

  @section('footer')
    <x-layouts.footer />
  @endsection
