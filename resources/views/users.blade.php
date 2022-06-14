@extends('layouts.app')

  @section('title')
    <title>Profile</title>
  @endsection

  @section('navbar')
    <x-layouts.navbar />
  @endsection

  @section('alerts')
    <x-layouts.alerts />
  @endsection

  @section('body')
    <x-user.cardWithUsersProfiles 
    :users=$users 
    route='users'
    modelForTranslation='User.' />
  @endsection

  @section('footer')
    <x-layouts.footer />
  @endsection
