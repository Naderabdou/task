<!DOCTYPE html>

<html>

<head>
    <title> {{ getSetting('main_fullname')->value }} </title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="@yield('meta_description')" />
    <meta name="keywords" content="@yield('meta_keywords')" />
    <meta name="author" content="" />
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="msapplication-TileColor" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    @include('site.layouts.style')

</head>

<body>


<div class="loader">
  <div class="loader-spinner">
    <svg viewBox="0 0 120 120" version="1.1" xmlns="http://www.w3.org/2000/svg">
      <circle class="load one" cx="60" cy="60" r="20" pathLength="1" />
      <circle class="load two" cx="60" cy="60" r="10" />
      <circle class="load three" cx="60" cy="60" r="30" pathLength="1" />
    </svg>
  </div>
</div>