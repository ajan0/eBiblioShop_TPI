<x-app-layout :showCategories="false">

    <div class="row justify-content-center mt-5 mb-3">
        <div class="col-4">
            <h1 class="">Réinitialiser le mot de passe</h1>
        </div>
    </div>
    <div class="row justify-content-center my-3">
        <div class="col-4">
            <form method="POST" action="{{-- route('password.update') --}}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div>
                    <label for="email">Email</label>

                    <input id="email" class="form-control mt-1" type="email" name="email" placeholder="nom@exemple.com" value="{{ old('email', $request->email) }}" required autofocus />
                </div>

                <!-- Password -->
                <div class="mt-3">
                    <label for="password">Nouveau mot de passe</label>

                    <input id="password" class="form-control mt-1" type="password" name="password" required />
                </div>

                <!-- Confirm Password -->
                <div class="mt-3">
                    <label for="password_confirmation">Confirmation du mot de passe</label>

                    <input id="password_confirmation" class="form-control mt-1"
                                        type="password"
                                        name="password_confirmation" required />
                </div>

                <button class="btn btn-primary w-100 my-4" type="submit">
                    Réinitialiser
                </button>
            </form>
        </div>
    </div>
    
</x-app-layout>