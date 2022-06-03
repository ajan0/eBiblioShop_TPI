<x-admin-layout>
<div class="container">
    <div class="row">
        <div class="col-6">
            <h1>Modifier un utilisateur</h1>
            <form action="{{ route('admin.users.store', $user) }}" method="POST">
                @csrf
                {{-- Input -> Title --}}
                <div class="form-group mb-3">
                    <label class="text-gray py-2" for="">Titre</label>
                    <select class="form-select" name="gender">
                        <option value="male" {{ $user->gender === 'male' ? 'selected' : '' }}>M.</option>
                        <option value="female" {{ $user->gender === 'female' ? 'selected' : '' }}>Mme</option>
                        <option value="other" {{ $user->gender === 'other' ? 'selected' : '' }}>Autre</option>
                    </select>
                </div>

                {{-- Input -> Firstname --}}
                <div class="form-group mb-3">
                    <label class="text-gray py-2" for="">Prénom</label>
                    <x-input type="text" name="firstname" value="{{ $user->firstname }}" />
                </div>

                {{-- Input -> Lastname --}}
                <div class="form-group mb-3">
                    <label class="text-gray py-2" for="">Nom</label>
                    <x-input type="text" name="lastname" value="{{ $user->lastname }}" />
                </div>
                
                {{-- Input -> email --}}
                <div class="form-group mb-3">
                    <label class="text-gray py-2">Adresse e-mail privée</label>
                    <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                </div>

                <div class="from-group d-flex">
                    <input class="btn btn-primary btn-sm ms-auto" type="submit" value="Enregistrer">
                </div>  
            </form>
        </div>
    </div>
</div>
</x-admin-layout>