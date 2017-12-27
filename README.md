PROJET CV Symfony 3.3 par Arnaud Lafon
==========

A Symfony project created on December 19, 2017, 5:33 pm.

# Installation

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