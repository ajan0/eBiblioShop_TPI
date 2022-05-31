<x-dashboard-layout>
@section('addresses')
    <div class="row">
        <div class="col-6">
            <h2 class="h6 my-3">Nouvelle adresse</h2>
            <x-forms.address routeName="addresses.store" />
        </div>
    </div>
@endsection

@push('scripts')
<script>
    new bootstrap.Tab(document.querySelector('#dashboardTabs button[data-bs-target="#addresses"]')).show()
</script>
@endpush
</x-dashboard-layout>