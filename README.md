# Computer Buying Pro

# Préparation:

  - Importer la BDD (Base de données) sur Php MyAdmin (pc_buying_pro.sql)
  - Adapter le fichier 'database.php' dans 'application/config'

# Stripe:

  - Dans les fichier 'charge.js' & 'ChargeController.class.php' si vous voulez voir les paiements, changer les clés publique (js/charge.js) et privée (controllers/payment/charge/ChargeController.class.php) avec les votres.

# Utilisateurs:

  - Trois comptes sont déjà enregistrés dans la BDD:
    - admin : email => admin@gmail.com, pseudo => admin, password => admin
    - premium : email => premium@gmail.com, pseudo => pro, password => pro
    - user : email => user@gmail.com, pseudo => user, password => user
  - Vous pouvez bien sur enregistrer d'autres comptes (user) et gérer leur role avec un compte admin

# IMPORTANT!

  - Vous ne pouvez pas payer de commandes sans être connecté
  - Pour passer un compte en 'admin', il faudra le changer directement en BDD (la fonction à été rendue impossible sur le site)
  - Vous pouvez (si vous le souhaitez) modifier le role de votre compte sur la page '/users/profil'
