# Projet PHP Pure

tp1:
Mon projet concerne un e-commerce, inspiré de pièces que j'ai fabriquées moi-même et d'une envie que j'ai. Le site consiste en un commerce électronique permettant aux artistes de promouvoir leurs œuvres artisanales. Dans le document SQL, le code a été envoyé pour créer 4 tables : genre, matière, produit et utilisation.
Certaines images d'illustration ont déjà été insérées, donc si vous insérez un nouveau produit, vous ne pourrez pas voir d'image, mais vous pourrez voir toutes les autres informations.
Dans le dossier « sql » vous trouverez les tables à insérer dans la base de données.

tp2:
Le projet est basé sur tp1 mais réalisé en utilisant le modèle MVC.
A noter que quelques changements ont été apportés par rapport à TP1, le nom du collaborateur est devenu artiste, ce qui équivaut à la table d’usager. Il y a également eu un changement dans la table des genres au niveau du nom du genre, qui est passé de "nom" à "nom_genre".

tp3:
Le projet est basé sur tp2.
Dans le document SQL, le code a été envoyé pour créer 6 tables : genre, log, material, privilege, produit, usager.
Notez que, contrairement à la version précédente, deux tables ont été ajoutées : la table 'log' qui permet de voir qui a accédé à la page et la table 'privilege', qui accorde différents privilèges à différents utilisateurs. Il est également important de souligner que des champs ont été ajoutés à la table 'usager', permettant à la personne de se connecter. Dans ce cas, nous aurons deux utilisateurs principaux pouvant se connecter au site web : l'administrateur, qui sera l'usager d'ID = 1, et l'employé, qui sera l'usager d'ID = 2.
L'utilisateur de privilège administrateur peut supprimer, modifier ou insérer des informations à tout moment et concernant tout autre usager (ou, dans notre cas plus spécifiquement, les artistes), ainsi que gérer la table des genres et des. De plus, il aura également accès au journal des connexions, qui sera disponible dans son menu principal.
L'utilisateur de privilège employé ne peut que modifier ou supprimer des informations concernant lui-même et ses produits.
Dans le dossier « sql » vous trouverez les tables à insérer dans la base de données.

Usager Admin :
Username : fernandafrata@gmail.com
Mot de Passe : 123456

Usager Emploi :
Username : juliafrata@gmail.com
Mot de Passe : 654321

Accès webdev : https://e2395117.webdev.cmaisonneuve.qc.ca/tp3-webdev/
Accès Github : https://github.com/fermamud/WebAvancee22635_Fernanda.git 
