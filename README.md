## Spec technique du projet 

- Laravel
- Livewire 
- Tailwind CSS
- Flowbite

## Spec fonctionnelle du projet 

- Création de tache 
- Création de catégorie
- Assigner une catégorie au tâche
- Gestion compte utilisateur
- Suppression des taches
- Suppression des catégories qui supprime les taches assignées à celle-ci
- Gestion de status des taches
- Drag and drop
- Dark mode and light mode

Pour lancer le projet 

Créer la DB : 
```bash
php artisan migrate
```

Lancer le serveur Laravel : 
```bash
php artisan serve
```

Lancer Vite pour le style : 
```bash
npm run dev
```

## Problème du projet

Il y a un problème d'event sur la page de des taches, si l'on bouge une tache de colonne avec le drag and drop ou alors les boutons, l'event lorsque l'on appuie sur les trois petits points ne fonctionne plus, il faut alors refresh la page. 
N'ayant jamais utilisé ni *__Blade__* ni *__Livewire__* ni les drag and drop je ne sais pas du tout d'où vient le problème et je n'ai pas réussi à la résoudre
J'ai l'impression que lorsque *__Livewire__* fait un re-render du component, tous les eventListener sont supprimés et ils ne sont pas remis par la suite. 
Sachant que je n'ai pas facilité les choses à utiliser les scripts de *__Flowbite__* pour développé l'interface plus rapidement, il doit y avoir des conflits entre tout.

J'ai aussi repéré des potentiels problème et lenteur au niveau de la modal des catégories. J'ai voulu utiliser la même modal avec le même form pour créer et modifier les catégories. J'ai décidié d'utiliser *__Livewire__* pour gérer l'état de ce form, il y a un petit temps de réactions et j'ai repéré une ou deux fois un fail mais sans context particulier. 