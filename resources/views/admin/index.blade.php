<x-admin-layout>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Utilisateurs</h1>
            <div class="row my-1 fw-bold">
                <div class="col-auto">ID</div>
                <div class="col-2">Nom et prénom</div>
                <div class="col-1">Genre</div>
                <div class="col-3">Adresse e-mail</div>
                <div class="col-2">Date de création</div>
                <div class="col-2">Actions</div>
            </div>
            @foreach ($users as $user)
                <div class="{{ $loop->odd ? 'bg-gray' : '' }}">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            {{ $user->id }}
                        </div>
                        <div class="col-2">
                            <a class="" href="{{ route('admin.users.edit', $user) }}">
                                {{ $user->fullname }}
                            </a>
                        </div>
                        <div class="col-1">
                            {{ $user->gender }}
                        </div>
                        <div class="col-3">
                            {{ $user->email }}
                            @if ($user->isVerified)
                                <span class="material-icons md-18 text-success" title="Vérifié">verified</span>
                            @endif
                        </div>
                        <div class="col-2">
                            {{ $user->created_at->format('d.m.Y') }}
                        </div>
                        <div class="col-2">
                            <div class="d-flex">
                                <a class="btn btn-sm p-0" href="{{ route('admin.users.edit', $user) }}">
                                    <span class="material-icons">edit</span>
                                </a>
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm p-0">
                                        <span class="material-icons">delete</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
</x-admin-layout>