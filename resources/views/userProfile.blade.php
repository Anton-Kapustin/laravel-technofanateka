@extends('layouts.app')

  @section('title')
    <title>Profile</title>
  @endsection

  @section('navbar')
    <x-layouts.navbar />
  @endsection

  @section('body')
    <x-user.cardWithUserProfile 
      :userData=$userModel 
      route='userProfile'
      modelForTranslation='User.' />
  @endsection

  @section('footer')
    <x-layouts.footer />
  @endsection
