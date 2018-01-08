PROJET CV Symfony 3.3
==========

Projet réalisé dans le cadre de la seconde année en cours de php symfony.
# Installation

<pre><code>cd cv_symfony</code></pre>

<pre><code>composer update</code></pre>

Il est nécessaire de modifier le fichier parameters.yml avec vos informations de base de donnée. Le fichier est situé dans " app/config ".

<pre>
parameters:
    database_host: 127.0.0.1
    database_port: null
    database_name: cv_symfony
    database_user: root
    database_password: root
    mailer_transport: smtp
    mailer_host: 127.0.0.1
    mailer_user: arnaud@arnaud.fr
    mailer_password: null
    secret: 28225f0789ef363772a2c5ad4e6f4446cd76daeb
</pre>

Création de la base de donnée : 

<pre><code>php bin/console doctrine:database:create
</code></pre>

Créer le schéma de base de donnée : 

<pre><code>php bin/console doctrine:schema:update --force</code></pre>

Récupération des données / fixtures :

<pre><code>php bin/console doctrine:fixtures:load
</code></pre>

Créer un admin :

<pre><code>php bin/console fos:user:create admin --super-admin</code></pre>

Lancer le server : 

<pre><code>php bin/console server:start</code></pre>

Ensuite pour consulter la page admin se rendre sur " /admin "