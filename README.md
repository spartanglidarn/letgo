# letShout by Erik Boström

The simplest way to start the application will be with docker and docker-compose(https://docs.docker.com/compose/install/). 
When you have docker-compose installed on your computer simply ad your twitter api keys in a .env file in the root folder and run ```docker-compose up``` from the project root folder in your terminal.

#### Technologis
  - PHP 7
  - PHPUnit
  - Twitter-api-php
  - Composer
  - Docker

#### Architecture
I have built the app mostly following the SOLID principles. Every function only have reason to change and are built to be able to extend in first hand. For the request it self  have a interface that will ensure that the essential functions will be in place in the future when it is time to add more requests to the application.

#### Problems
I had never worked with the Twitter API before so I had some problem getting the connection to the API upp and running. But after some Google searching i found a PHP lib called Twitter-api-php witch worked very well for this assignment.

#### Time
This test took me a little bit less then a office day, I would say around 6-7 houres. 