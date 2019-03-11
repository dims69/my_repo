# S4C2 Olivier Pouchoy CV

J'ai voulus crée ce Cv dans le but qu'il soit le plus modifiable possible, afin d'etre réutilisable par d'autre mais aussi avec la possibilité d'etre mit a jour rapidement et simplement.


## Fonctionalités majeurs:

* Tout le contenu texte est modifiable: une fois connecté en tant qu'administrateur vous avez accès a des bouton de modification / création / supression.![Alt text](/readimg/crud.png "Modification")
* Le menu renvoie a des encre sur le site et le scroll ce fait a travers une fonction javascript afin d'etre plus fluide.
* Le menu est crée à partir d'une base css avec des fontionnalités js (changement de couleur des catégories au scroll)
* L'annotion @ApiResource est présente sour chaque entité. 
* Le projet est selon Checkstyle conforme.
* Le site est responsive.
* Il y a deux test , un test unitaire qui test si la class et l'Entity Experience fonctionne, et un texte fonctionnel si la base renvoie bien le nom de l'Entity personne.
* L'annotion @ApiResource est présente sour chaque entité. ![Alt text](/readimg/api.PNG "api")

### Prerequis

Afin de se connecter au CV le lien est le [suivant](https://module-symfony-dims69.c9users.io/my_cv/public/)

## Installation

Crée un dossier my_cv puis glissé les éléments a l'interieure.

```
cd my_cv
```
Puis les commandes sont accessible via la commande 

```
 php bin/console
```
## Les tests

### Ce test vérifie si l'Entity Experience fonctionne et ajoute bien les titre grace au fonction SetTitle

```
 php vendor/bin/codecept run unit ExampleTest
```
![Alt text](/readimg/assertion.PNG "assertion")
-------------------------------------------------------------------------------------------

### Ce test vérifie si il trouve mon nom et prénom Dans la page principale du CV

```
 php vendor/bin/codecept run acceptance SigninCest
```
![Alt text](/readimg/accept.PNG "acceptance")

## Admin

Appuyer sur le bouton se connecter
* Identifiant :  admin
* Mot de passe : password

![Alt text](/readimg/connexion.PNG "Connection")

## Auteur

* **Coquil** - *Initiateur* -
* **Pouchoy Olivier**

