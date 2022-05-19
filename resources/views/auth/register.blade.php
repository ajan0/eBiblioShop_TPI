<x-app-layout :showCategories="false">

    <div class="row justify-content-center my-5">
        <div class="col-4">
            <h1 class="">Inscription en toute simplicité.</h1>
        </div>
    </div>
    <div class="row justify-content-center my-3">
        <div class="col-4">
            <h2 class="h3 fw-normal mb-4">Créer votre premier compte client</h2>
            <form action="">
                <div class="row mb-3">
                    <div class="col-6">
                        <label class="form-label">Nom*</label>
                        <input type="email" class="form-control" placeholder="Jean" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Prénom*</label>
                        <input type="email" class="form-control" placeholder="Dubois" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Adresse E-mail*</label>
                    <input type="email" class="form-control" placeholder="nom@exemple.com" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mot de passe*</label>
                    <input type="password" class="form-control" required>
                    <span class="small text-muted">Au moins 8 caractères, une majuscule et une minuscule, un chiffre ou un caractère spécial</span>
                </div>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" name="consent">
                    <label class="form-check-label small text-muted">
                        J'accepte les conditions générales de vente et la réception d'informations.
                    </label>
                </div>
                <input class="btn btn-primary w-100 my-2" type="submit" value="inscription">
                <span class="text-muted small">* Champs obligatoires</span>
            </form>
        </div>
    </div>
    
</x-app-layout>