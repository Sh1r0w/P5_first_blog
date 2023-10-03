# P5_first_blog
P5_first_blog

1 - required software

- VS code (or alternative)
- Composer
- Xampp or Wampp

--------------------

2 - clone the projet.

To clone the project, copy the link : git clone https://github.com/Sh1r0w/P5_first_blog.git

Create an empty file, open it with VS Code, (open folder)

then open a terminal and paste the link copied above.

--------------------

3 - backend initialization
create file .env in file folder 'src/controllers' complet the variable
USER="root"
PWD="" (your password in mysql)
DATABASE="ae_blog"
SERVER="localhost"

And 

type "composer i" in the VS Code terminal, to install the necessary dependencies.

--------------------

4 - first launch

In the terminal issue the commande 'php -S localhost:3000 -t public' and restart php server.

in xampp enabled Apache and MySQL servers.

In your browser, go to http://localhost:3000/

on first launch, the database is automatically created, along with the tables needed to run the blog.

Create your account (the first account created is automatically Administrator).


