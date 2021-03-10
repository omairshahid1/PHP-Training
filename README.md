**1- Things that we need to install**

composer require predis/predis

npm install -g laravel-echo-server

npm install laravel-echo

npm install socket.io-client

we also need to initialize laravel echo-server like that

laravel-echo-server init


**2- Update configuration File**

In this step, we need to add set configuration on env file and database configuration file. you you need to set env file with BROADCAST_DRIVER as redis and database configuration and also database redis configuration.

Let's updated files:

BROADCAST_DRIVER=redis
  
DB_DATABASE=blog_chat
DB_USERNAME=root
DB_PASSWORD=root
  
REDIS_HOST=localhost
REDIS_PASSWORD=null
REDIS_PORT=6379
   
LARAVEL_ECHO_PORT=6001


**3- We need to start redis-client and server and laravel echo server**

**4- At last we need to run**

npm run dev

**To run this project into your system you need to follow the following instructions**

Download or clone the project

Run Npm install

Run migration

Install redis on local and start it

Start the laravel-echo-server



**Remember**

To run all this system on local we need to install redis locally