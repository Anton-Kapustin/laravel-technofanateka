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
    <x-accessory.accessoryNav />
    <x-accessory.accessoriesBlock 
      title="Комплектующие" 
      :elements="$arrayAccessory" 
      :accessoryName=$accessoryName 
      />
    <x-pagination :news=$arrayAccessory />
  @endsection

@section('footer')
  <x-layouts.footer />
@endsection
