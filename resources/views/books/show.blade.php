<x-app-layout :showCategories="true" :showBreadcrumbs="true">

    <h1 class="h2 mb-4">Aperçu du livre</h1>

    {{-- Book information --}}
    <div class="row">
        <div class="col">
            <x-books.overview />
        </div>
    </div>

    {{-- Description of book/author --}}
    <div class="row mt-5">
        <div class="col-9">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Sommaire</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Auteur</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-9">
            <div class="border border-top-0 p-3">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius alias, tempora saepe laboriosam, non pariatur enim sint doloremque voluptates recusandae earum obcaecati quis at iusto fugit fugiat minima quia sunt?
                Voluptatum saepe quibusdam incidunt tempora ratione ullam itaque asperiores at reiciendis assumenda, placeat quasi mollitia facere accusamus odit modi iusto totam laudantium omnis quia obcaecati? Voluptas, adipisci porro. Est, reiciendis.
                Fugiat libero repudiandae perferendis, iste dolorum dolores, itaque earum iure consequatur omnis natus eveniet distinctio pariatur ab. Molestias, sunt sit modi, voluptates vitae rem illum praesentium harum error quos nobis?
                Alias praesentium quam, sint temporibus minima quia illo architecto amet maxime assumenda, odit eveniet, unde nemo voluptatem ipsa consectetur error perferendis optio? Eligendi, expedita quae! Neque repudiandae ea esse a?
                Saepe illo quia enim voluptatibus a debitis magnam dignissimos placeat! Reiciendis expedita modi cum et praesentium dolore fugit enim amet consectetur? Accusantium totam illo fuga eligendi dolore voluptate ex eius.
                Natus animi nesciunt vitae, quos qui odio! Tenetur incidunt aperiam similique doloremque quibusdam inventore repudiandae quas eveniet autem vero optio, distinctio nobis voluptate cumque consequuntur. Deserunt eum commodi tempore sunt.
                Quia hic laudantium voluptas harum labore repellendus eveniet officiis asperiores, dolorum esse aut provident facilis, quaerat fugit facere unde, illum natus porro omnis neque aspernatur voluptatibus eaque beatae ut. Magnam?
                Repudiandae dolor saepe quia possimus repellendus, laboriosam sint pariatur minus corrupti laudantium, nostrum illo a doloribus? Rerum facilis fugit odio quibusdam recusandae ratione nemo natus quo et, distinctio, esse asperiores.
                Eum expedita aperiam quos animi dolore voluptatem in, quae voluptas, sit aut asperiores, laborum nesciunt reiciendis harum ad ducimus delectus. Dicta ut omnis veniam vero quod nulla quasi corrupti et?
                Molestiae quisquam eum saepe voluptate! Facilis, atque? Doloribus at culpa, mollitia temporibus dicta error amet debitis libero quo velit optio voluptatibus sapiente animi. Corrupti nulla nesciunt at, quo dolorum corporis.
            </div>
        </div>
    </div>
</x-app-layout>