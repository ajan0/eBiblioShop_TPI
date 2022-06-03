<x-app-layout :showCategories="false" :showBreadcrumbs="true">
    {{-- Top row --}}
    <div class="row mt-4">
        <div class="col-2">
            <div class="d-flex flex-column align-items-center me-4">
                {{-- Profile picture --}}
                <div class="user-avatar rounded-circle">
                    <img class="w-100" src="{{ asset('img/avatars/laravel.jpg') }}" alt="Profile picture">
                </div>
            </div>
        </div>
        <div class="col-10">
            <div>
                <h1 class="h3 m-0">{{ auth()->user()->fullname }}</h1>
                <span class="small text-muted">Membre depuis {{ auth()->user()->created_at->format('M Y') }}</span>
            </div>
        </div>
    </div>
    {{-- Tabs --}}
    <div class="row mt-5">
        <div class="col">
            <ul class="nav nav-tabs  mb-4" id="dashboardTabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link {{ request()->route()->getName() === 'dashboard.indexAccount' ? 'active show' : '' }}" href="{{ route('dashboard.indexAccount') }}">Compte</a>
                </li>
                <li class="nav-item {{ request()->route()->getName() === 'dashboard.indexBooks' ? 'active show' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard.indexBooks') }}">Mes livres</a>
                </li>
                <li class="nav-item {{ request()->route()->getName() === 'dashboard.indexOrders' ? 'active show' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard.indexOrders') }}">Achats</a>
                </li>
                <li class="nav-item {{ str_contains(request()->route()->getName(), 'addresses') ? 'active show' : '' }}">
                    <a class="nav-link" href="{{ route('addresses.index') }}">Adresses</a>
                </li>
                <li class="nav-item {{ request()->route()->getName() === 'dashboard.indexSales' ? 'active show' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard.indexSales') }}">Transactions</a>
                </li>
            </ul>
            <div class="tab-content">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-app-layout>