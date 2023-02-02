@extends('layouts.backend')

@section('css_after')
    @yield('css_aftera')
@endsection
@section('content')
<!-- Page Content -->
<div class="content">
    <h2 class="content-heading">Portal Setup <small>Settings</small></h2>
        <!-- Simple Wizard 2 -->
    <div class="js-wizard-simple block">
        <!-- Step Tabs -->
        <ul class="nav nav-tabs nav-tabs-alt nav-fill">
            <li class="nav-item">
            <a class="nav-link{{ request()->is('portalsettings/menus*') ? ' active' : '' }}" href="{{route('menus.index') }}">1. Menu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ request()->is('portalsettings/submenus*') ? ' active' : '' }}" href="{{route('submenus.index')}}">2. Submenu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ request()->is('portalsettings/permissions*') ? ' active' : '' }}" href="{{route('permissions.index')}}">3. Permission</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ request()->is('portalsettings/roles*') ? ' active' : '' }}" href="{{route('roles.index')}}">4. Roles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ request()->is('portalsettings/users*') ? ' active' : '' }}" href="{{route('users.index')}}">5. Users</a>
            </li>
        </ul>
        <!-- END Step Tabs -->

        <!-- Form -->
            <!-- Steps Content -->
        <div class="block-content block-content-full tab-content" style="min-height: 267px;">
            <!-- Step 1 -->
            <div class="tab-pane active" id="wizard-simple2-step1" >
                @yield('contenta')
            </div>
        </div>
    </div>
@endsection
@section('js_after')
    @yield('js_aftera')
@endsection

