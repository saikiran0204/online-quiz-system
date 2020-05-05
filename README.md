# online-quiz-system

This is similar to online quiz system.
But instead of quiz here one word answers.

This can be run in any operating system.

For windows users, you have to install xampp application
and then save all the files in htdocs folder in the xampp application where it is installed.

for linux user , you have to install apache server and phpmyadmin
and save this all the files to /var/www/html/ directory

And then the run the apache server and phpmyadmin application.
then open phpmyadmin and import the database test1.sql and zlog.sql.

who have to insert the rounds for ex: 
id  start_time end_time
1    00:00:00   00:10:00

this means the first round is for 10 minuates.

And the you have to insert questions and answers in the database.

Edit the account.php at line 15 to set when to start the quiz.

To insert users you have first insert to register table only name and team and reg = 0 which means not registered.

And then the users should register and then login.

The scores will be displayed in the dashboard.

All the log will be saved in zlog.
