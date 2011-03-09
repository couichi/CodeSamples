*Introduction
I created this web application, CodeSamples, 
which stores sample source codes of various languages, for my self-study.
The features I needed are the following:
1. Source code registration
2. Source code search
	search by tags
	search by languages
	display codes order by number of lines
3. Syntax highlighting
4. Tag suggestion 

I had implemented 1 and 2, but I had not written any test cases for them, 
so I expect them to have some bugs. 
Some of the input validations are also simply not there. 
As for 3, the syntax highlighting, I used SyntaxHighlighter:
http://alexgorbatchev.com/SyntaxHighlighter/ 
As for 4, I implemented it with jQuery by myself for study, 
however an external library, such like suggest.js:
http://www.enjoyxstudy.com/javascript/suggest/index.en.html 
is much better, so I am intending to replace it later on.


*About me
I am a self-taught PHP programmer. I have been using it for more than several years now. 
I started using it with PHPdev on windows. However, 
there were intermissions in my study history of PHP 
since I only studied it whenever I needed to write something.
I started studying Object Oriented Programming from about the end of year 2010 
because a web application I was working on at that time, which manages your goal, 
to-dos, invested time  and estimation, 
became really unmanageable when the lines of code I had written exceeded 30,000 lines.
CodeSamples is the first web application I created with OOP.
I started using Git since this year, and I'm intending to study TDD.


*Development environment
I used XAMPP for Windows version 1.7.3
Apache 2.2.14 (IPv6 enabled) + OpenSSL 0.9.8l
MySQL 5.1.41 + PBXT engine
PHP 5.3.1
PHPMyAdmin 3.2.4
Perl 5.10.1
FileZilla FTP Server 0.9.33
Mercury Mail Transport System 4.72


*A note for the readers
Please do not expect to find much comments in my source codes, 
for I had not written them most of the time. I'm sorry.
Most of the form variables are consistent with the database fields' names, 
except for a form variable called 'tags'. 
The corresponding field name for 'tags' in the database is 'specialities' or 'specs'.
I designed database tables first and at that time 'specialities' seemed a good idea.




*Database
The back-end's database is MySQL.
The database is consisted by the following five tables:

codes - Stores source codes
specialities - Stores tags
langs - The list of languages which is dealt with by CodeSamples
code_specs - Maps codes and specialities
lang_specs - Maps language and specialities


CREATE TABLE `codes` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `code` text NOT NULL,
 `description` text NOT NULL,
 `linenum` tinyint(3) unsigned NOT NULL,
 `lang_id` int(10) unsigned NOT NULL,
 `created` datetime NOT NULL,
 `modified` datetime NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1



CREATE TABLE `specialities` (
 `speciality` varchar(64) NOT NULL,
 `id` int(11) NOT NULL AUTO_INCREMENT,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1


CREATE TABLE `langs` (
 `langname` varchar(20) NOT NULL,
 `id` int(11) NOT NULL AUTO_INCREMENT,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18446744073709551615 DEFAULT CHARSET=latin1


CREATE TABLE `code_specs` (
 `code_id` int(10) unsigned NOT NULL,
 `sp_id` int(10) unsigned NOT NULL,
 PRIMARY KEY (`code_id`,`sp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1


CREATE TABLE `lang_specs` (
 `lang_id` int(10) unsigned NOT NULL,
 `sp_id` int(10) unsigned NOT NULL,
 PRIMARY KEY (`lang_id`,`sp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1


*Postface
Thank you for reading and for your interest. 
If it is not too much trouble, please give me some feedback.