@extends('layouts.app')

@section('title')
  <title>ADMIN</title>
@endsection

@section('navbar')
  <x-layouts.navbar />
@endsection

@section('alerts')
  <x-layouts.alerts />
@endsection

@section('body')
  <x-assemble.assembleNav >

    <x-slot name="game">
      <x-assemble.assembleBlock 
        title='Сборки'
        :elements=$assembleGame
        modelForTranslation="Accessory."
      />
    </x-slot>

    <x-slot name="office">
      <x-assemble.assembleBlock 
        title='Сборки'
        :elements=$assembleOffice
        modelForTranslation="Accessory."
      />
    </x-slot>

  </x-assemble.assembleNav>

@endsection

@section('footer')
  <x-layouts.footer />
@endsection
