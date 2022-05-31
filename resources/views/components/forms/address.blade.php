@php
    if (isset($address))
    {
        extract($address->address->toArray());
    }
@endphp
<form action="{{ isset($address) ? route('addresses.update', $address) : route('addresses.store') }}" method="post">
    @csrf
    @isset($address)
        @method('PUT')
    @endisset
    <div class="mb-2">
        <div class="row">
            <div class="col-6">
                <label class="form-label">Nom*</label>
                <x-inputs.field type="text" name="lastname" :value="$lastname ?? ''" required autofocus />
            </div>
            <div class="col-6">
                <label class="form-label">Prénom*</label>
                <x-inputs.field type="text" name="firstname" :value="$firstname ?? ''" required />
            </div>
        </div>
    </div>
    <div class="mb-2">
        <div class="row">
            <div class="col-9">
                <label class="form-label">Rue*</label>
                <x-inputs.field type="text" name="street" :value="$street ?? ''" required />
            </div>
            <div class="col-3">
                <label class="form-label">Numéro*</label>
                <x-inputs.field type="number" name="street_number" :value="$street_number ?? ''" required />
            </div>
        </div>
    </div>
    <div class="mb-4">
        <div class="row">
            <div class="col-3">
                <label class="form-label">Code postale*</label>
                <x-inputs.field type="number" size="4" name="postcode" :value="$postcode ?? ''" required />
            </div>
            <div class="col-9">
                <label class="form-label">Ville*</label>
                <x-inputs.field type="text" name="city" :value="$city ?? ''" required />
            </div>
        </div>
    </div>
    <div class="d-flex flex-row-reverse">
        <button class="btn btn-primary" type="submit">
            {{ isset($address) ? 'Modifier' : 'Enregistrer' }}
        </button>
        @isset($address)
            <button id="btnDeleteAddress" data-id="{{ $address->id }}" class="btn btn-outline-primary d-flex align-items-center me-2" type="button">
                <span class="material-icons">delete_outline</span>
                <span>Supprimer</span>
            </button>
            @push('scripts')
                <script>
                    document.querySelector('#btnDeleteAddress').onclick = function(){
                        let id = document.querySelector('#btnDeleteAddress').dataset.id;
                        if (confirm('Êtes-vous sûr de vouloir supprimmer cette adresse ?')){
                            axios
                                .delete(`/api/dashboard/addresses/${id}`)
                                .then((response) => {
                                    console.log(response);
                                    // window.location = "/dashboard/addresses"
                                })
                        }
                    };
                </script>
            @endpush          
        @endisset
    </div>
</form>
