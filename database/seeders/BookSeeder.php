<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::pluck('id');

        DB::table('books')->insert([
            'title' => 'Brève histoire des origines de l\'humanité',
            'price' => 3180,
            'quantity' => rand(1,21),
            'pages_num' => 318,
            'ean' => '9791021050013',
            'description' => "Nos connaissances sur l'évolution humaine se multiplient à un rythme inédit. Les chercheurs se penchent sur les périodes les plus lointaines et des contrées encore inexplorées, alors que des techniques novatrices apportent des informations inattendues. Toumaï, avec ses 7 millions d'années, est à ce jour le plus ancien représentant connu de notre grande famille. De nouvelles branches d'hominines sont apparues en Asie. Notre ADN comprend des fragments hérités des Néandertaliens mais aussi d'autres groupes humains, comme les Dénisoviens. Des dizaines d'espèces ont coexisté, vivant parfois dans les mêmes régions. Chaque découverte nous fait entrevoir combien les capacités de nos lointains cousins étaient plus élaborées que ce que nous avions pu imaginer. C'est aujourd'hui une nouvelle histoire du buisson de l'humanité qu'il faut raconter.",
            'cover_path' => 'img/covers/cover_1.jpg',
            'publish_at' => Carbon::create(2022,2,1),
            'user_id' => $users->random(),
            'editor_id' => 1,
            'category_id' => 1,
        ]);

        DB::table('books')->insert([
            'title' => 'Les victimes oubliées du IIIe Reich',
            'price' => 2900,
            'quantity' => rand(1,21),
            'pages_num' => 407,
            'ean' => '9782889500673',
            'description' => "Entre 1933 et 1945, au moins 391 Suisses ont été emprisonnés dans des camps de concentration par le régime nazi et plus de 200 d\'entre eux sont morts durant leur captivité ou peu après leur libération. Ce livre retrace leur parcours et leur destin. En plus du sort de ces citoyens suisses, les auteurs suivent le parcours de plus 330 hommes, femmes et enfants nés ou ayant grandi en Suisse, mais qui n\'ont jamais eu la nationalité suisse et qui furent emprisonnés dans les camps nazis. Parmi ces derniers, plus de 250 n\'ont pas survécu aux mauvais traitements et à la torture. Les victimes suisses des persécutions nazies sont principalement des résistants, des juifs, des socialistes, des personnes considérées comme \" asociales \", des témoins de Jéhovah, des Sinti et des Roms. Pour la première fois, les auteurs répertorient les noms des 391 victimes identifiées. La plupart d\'entre elles vivaient en France et ont été emprisonnées, puis expulsées vers un camp de concentration. D\'autres, des Suisses de l\'étranger, vivaient dans des pays occupés par l\'Allemagne comme la Pologne, l\'Autriche, l\'Italie, la Belgique ou la Grèce. Dans ce livre, les auteurs examinent comment les citoyens suisses furent pris dans l\'appareil de terreur nazi et ce que la Suisse officielle a fait pour les aider. Après quatre années de recherche dans les archives en Suisse et à l\'étranger, ils arrivent à la conclusion que \"La Suisse aurait pu sauver des dizaines de vies, si elle s\'était engagée avec courage et vigueur pour les prisonniers suisses des camps de concentration\". D\'une part, il apparaît clairement que le Conseil fédéral et les diplomates concernés sont intervenus avec peu de détermination face au régime nazi ; par peur de mettre Hitler en colère et de provoquer une invasion de la Suisse. D\'autre part, les auteurs soulignent le peu d\'intérêts des instances officielles suisses pour les victimes.",
            'cover_path' => 'img/covers/cover_2.jpg',
            'publish_at' => Carbon::create(2021,11,1),
            'user_id' => $users->random(),
            'editor_id' => 2,
            'category_id' => 1,
        ]);

        DB::table('books')->insert([
            'title' => 'Le jeune homme',
            'price' => 1330,
            'quantity' => rand(1,21),
            'pages_num' => 48,
            'ean' => '9782072980084',
            'description' => "En quelques pages, à la première personne, Annie Ernaux raconte une relation vécue avec un homme de trente ans de moins qu\'elle. Une expérience qui la fit redevenir, l\'espace de plusieurs mois, la \"fille scandaleuse\" de sa jeunesse. Un voyage dans le temps qui lui permit de franchir une étape décisive dans son écriture. Ce texte est une clé pour lire l\'oeuvre d\'Annie Ernaux - son rapport au temps et à l\'écriture.",
            'cover_path' => 'img/covers/cover_3.jpg',
            'publish_at' => Carbon::create(2022,5,1),
            'user_id' => $users->random(),
            'editor_id' => 3,
            'category_id' => 3,
        ]);

        DB::table('books')->insert([
            'title' => 'Passagère du silence',
            'price' => 1350,
            'quantity' => rand(1,21),
            'pages_num' => 311,
            'ean' => '9782253114666',
            'description' => "Tout quitter du jour au lendemain pour aller chercher, seule, au fin fond de la Chine communiste, les secrets oubliés de l\'art antique chinois, était-ce bien raisonnable ? Fabienne Verdier ne s\'est pas posé la question : en ce début des années 1980, la jeune et brillante étudiante des Beaux-Arts est comme aimantée par le désir d\'apprendre cet art pictural et calligraphique dévasté par la Révolution culturelle. Et lorsque, étrangère et perdue dans la province du Sichuan, elle se retrouve dans une école artistique régie par le Parti, elle est déterminée à affronter tous les obstacles : la langue et la méfiance des Chinois, mais aussi l\'insupportable promiscuité, la misère et la saleté ambiantes, la maladie et le système inquisitorial de l\'administration... Dans un oubli total de l\'Occident, elle devient l\'élève de très grands artistes méprisés et marginalisés qui l\'initient aux secrets et aux codes d\'un enseignement millénaire. De cette expérience unique sont nés un vrai récit d\'aventures et une œuvre personnelle fascinante, qui marie l\'inspiration orientale à l\'art contemporain, et dont témoigne son extraordinaire livre d\'art L\'Unique Trait de pinceau (Albin Michel).",
            'cover_path' => 'img/covers/cover_4.jpg',
            'publish_at' => Carbon::create(2005,10,1),
            'user_id' => $users->random(),
            'editor_id' => 4,
            'category_id' => 4,
        ]);

        DB::table('books')->insert([
            'title' => 'L\'invention de Dieu',
            'price' => 1620,
            'quantity' => rand(1,21),
            'pages_num' => 336,
            'ean' => '9782757868195',
            'description' => "Comment un dieu parmi d\'autres est-il devenu Dieu ? Telle est l\'énigme fondatrice que cette plongée aux sources du monothéisme se propose d\'élucider en parcourant, sur un millénaire, les étapes de son invention. D\'où vient ce dieu ? Quels étaient ses attributs et quel était son nom avant que celui-ci ne devienne imprononçable ? Sous quelles formes était-il vénéré? Pourquoi les autres divinités déchurent-elles ? A la lumière de la critique historique, philologique et exégétique et des plus récentes découvertes de l\'archéologie et de l\'épigraphie, Thomas Römer livre les réponses d\'une enquête passionnante sur les traces d\'une divinité de l\'orage et de la guerre érigée, après sa \"victoire\" sur ses rivaux, en dieu unique, universel et transcendant.",
            'description_author' => "Thomas Römer, spécialiste mondialement reconnu de l\'Ancien Testament, occupe la chaire \"Milieux bibliques\" au Collège de France ; il est également professeur à la Faculté de théologie et de sciences des religions de l\'Université de Lausanne.",
            'cover_path' => 'img/covers/cover_5.jpg',
            'publish_at' => Carbon::create(2017,8,1),
            'user_id' => $users->random(),
            'editor_id' => 5,
            'category_id' => 5,
        ]);

        DB::table('books')->insert([
            'title' => 'Atlas d\'anatomie humaine',
            'price' => 14110,
            'quantity' => rand(1,21),
            'pages_num' => 672,
            'ean' => '9782294756290',
            'description' => "Depuis plus de 25 ans l\'Atlas d\'anatomie humaine Netter est l\'atlas de référence internationale. Le succès de cet ouvrage réside dans la qualité et la beauté du travail du Dr Frank H. Netter ainsi que du Dr Carlos A. G. Machado parmi les plus grands illustrateurs médicaux au monde. Ensemble ces deux médecins-artistes au talent unique mettent en évidence le corps humain du point de vue du clinicien. Plus de 50 images radiologiques soigneusement sélectionnées permettent de relier l\'anatomie illustrée à l\'anatomie vivante pour aider à la compréhension et à la pratique quotidienne. Cette 7e édition s\'enrichit de nombreux contenus la rendant encore plus didactique : - Nouvelle section \"Vue d\'ensemble des systèmes\" offrant une vue complète de l\'anatomie des vaisseaux des nerfs et des lymphatiques. - Plus de 25 nouvelles illustrations du Dr Machado présentant les structures anatomiques ayant une implication clinique (les gaines fasciales du cou les veines profondes de la jambe les bourses de la hanche et la vascularisation de la prostate) ainsi que des zones difficiles à visualiser comme la fosse infratemporale. - Nouveaux tableaux cliniques à la fin de chaque section régionale qui se concentrent sur les structures ayant une signification clinique élevée. Ces tableaux fournissent des résumés rapides organisés selon les systèmes du corps humain et précisent dans quelles illustrations ces structures sont les mieux visibles. - Plus de 50 nouvelles images radiologiques utilisant les nouveaux outils d\'imagerie médicale. Ces clichés ont été sélectionnés selon des critères d\'utilité pour les étudiants apprenant l\'anatomie. Enfin cette 7e édition donne accès aux compléments en ligne français - planches à légender QCM avec réponses commentées ainsi que 100 cas cliniques - et à l\'ensemble des compléments en ligne américains via le site Student Consult - nouveaux modèles tridimensionnels (3D) vidéos de dissections planches de dissections commentées ainsi que des planches supplémentaires. L\'Atlas d\'anatomie humaine Netter est l\'ouvrage de référence indispensable à tous les étudiants en médecine ; il les accompagnera durant toutes leurs études.",
            'cover_path' => 'img/covers/cover_6.jpg',
            'publish_at' => Carbon::create(2019,6,1),
            'user_id' => $users->random(),
            'editor_id' => 6,
            'category_id' => 6,
        ]);

        DB::table('books')->insert([
            'title' => 'Les identités meurtrières',
            'price' => 1260,
            'quantity' => rand(1,21),
            'pages_num' => 189,
            'ean' => '9782253150053',
            'description' => "Que signifie le besoin d\'appartenance collective, qu\'elle soit culturelle, religieuse ou nationale ? Pourquoi ce désir, en soi légitime, conduit-il si souvent à la peur de l\'autre et à sa négation ? Nos sociétés sont-elles condamnées à la violence sous prétexte que tous les êtres n\'ont pas la même langue, la même foi ou la même couleur ? Né au confluent de plusieurs traditions, le romancier du Rocher de Tanios (prix Goncourt 1993) puise dans son expérience personnelle, aussi bien que dans l\'histoire, l\'actualité ou la philosophie, pour interroger cette notion cruciale d\'identité. Il montre comment, loin d\'être donnée une fois pour toutes, l\'identité est une construction qui peut varier. Il en dénonce les illusions, les pièges, les instrumentations. Il nous invite à un humanisme ouvert qui refuse à la fois l\'uniformisation planétaire et le repli sur la \" tribu \". D\'une voix pudique, sereine, Amin Maalouf énonce tout simplement dès enjeux de civilisation pour le troisième millénaire. Henri Tincq, Le Monde. Un livre passionnant à l\'heure où une conception hégémonique, marchande, de la mondialisation allume des mèches sous des barils de poudre. Jacques Coubart, L\'Humanité. Par la voix de cet écrivain libanais de langue française, la vieille Europe nous fait encore partager la plus belle, la plus féconde de ses convictions. François Sureau, L\'Express.",
            'description_author' => "Amin Maalouf a publié les Croisades vues par les Arabes, ainsi que six romans: Léon l\'Africain, Samarcande, les Jardins de lumière, le Premier siècle après Béatrice, le Rocher de Tanios et les Echelles du Levant.",
            'cover_path' => 'img/covers/cover_7.jpg',
            'publish_at' => Carbon::create(2001,2,1),
            'user_id' => $users->random(),
            'editor_id' => 4,
            'category_id' => 7,
        ]);

        DB::table('books')->insert([
            'title' => 'Apprenez à programmer en Python',
            'price' => 0,
            'quantity' => rand(1,21),
            'pages_num' => 490,
            'ean' => '9782416006555',
            'description' => "Vous n\'y connaissez rien en programmation et vous souhaitez apprendre un langage clair et intuitif ? Python est fait pour vous ! Vous découvrirez dans ce livre conçu pour les débutants tout ce dont vous avez besoin pour programmer, des bases à la bibliothèque standard en passant par la programmation orientée objet. Dans cette quatrième édition, vous trouverez aussi des mises à jour pour la nouvelle version de Python sur le tri, les tests unitaires, le threading... Qu\'allez-vous apprendre ? Qu\'est-ce que la programmation ? Quel langage choisir ? Pourquoi Python ? Installation de Python et découverte du langage Les concepts de la programmation orientée objet Initiations aux interfaces graphiques avec Tkinter Communication en réseau dans les programmes Python Les bonnes pratiques, pour améliorer vos codes",
            'cover_path' => 'img/covers/cover_8.jpg',
            'publish_at' => Carbon::create(2022,3,1),
            'user_id' => $users->random(),
            'editor_id' => 7,
            'category_id' => 8,
        ]);

        DB::table('books')->insert([
            'title' => 'Le Japon',
            'price' => 0,
            'quantity' => rand(1,21),
            'pages_num' => 251,
            'ean' => '9782390251552',
            'description' => "Nicolas Wauters est guide et photographe. Basé à Tokyo, il propose un guide loin des clichés, mais où les endroits mythiques du Japon sont bien présents et transcendés par ses photos. Il nous fait notamment découvrir un Tokyo empreint de silence et de quiétude, parfois la nuit même. Ses images sont accompagnées d\'un QR codes qui permet de bénéficier de données mises à jour en permanence. Jamais d\'adresses erronées ou d\'horaire modifié.",
            'cover_path' => 'img/covers/cover_9.jpg',
            'publish_at' => Carbon::create(2022,5,1),
            'user_id' => $users->random(),
            'editor_id' => 8,
            'category_id' => 1,
        ]);
    }
}
