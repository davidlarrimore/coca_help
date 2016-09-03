#LRES PTO Superhero Fun Run Facebook App
This single page application is used to support the LRES PTO Fun Run Facebook App which is used to share information on the status and progress of the LRES PTO Fun Run donation drive.

##About

This project started as a fork from another project designed around a single page PHP Slim application to be put on shared hosting. It has now matured to include Test Automation and Continuous Integration principles.



##Setup

This project requires configuration files (See below) and data files (pulled from CauseVox).



##Configuration

This project requires configuration files (See below) and data files (pulled from CauseVox).





##Dependencies

1. PHP 5.6 or greater
2. Git
3. phing
4. Composer
5. pear (Net_FTP)
6. bowerphp



##Run locally

  php -S localhost:8000

URL:[http://localhost:8000/](http://localhost:8000/)




##CI/CD (Phing) Configuration
The Phing configuration is dynamic and will support any amount of environments. It requires SSH and FTP access to the server. I'm still in the initial phases, but essentially all you have to do is do a base setup as follows:


1. clone branch to remote location that you want to deploy to. For example, I cloned "test" to my testfunrunfbapp directory but it is test....yeah yeah.....). So I just ran some shell magic to initialize the environment.


    git clone https://github.com/davidlarrimore/lresptofunrun.git ./
    git checkout dev  # <-- name of the branch I wanted
    composer update # <-- for some reason, phing couldn't run this the first time.
    composer install # <-- for some reason, phing couldn't run this the first time.

2. Setup the build.properties file under "config" folder

environments=test,production

  test.hostname=hostname for SSH
  test.ftphostname=hostname for FTP
  test.ftpport=21
  test.username=username
  test.password=super_secure_password
  test.documentroot=testfunrunfbapp.lrespto.org
  test.repositoryname=test

  githubApiKey=longstring





This project started as a fork from another project designed around a single page PHP Slim application to be put on shared hosting. It has now matured to include Test Automation and Continuous Integration principles.





##TODO

1. Make the website configurable so I can easily setup phases that use the system dates to determine which page to show. Phases should be prepare (Show a simple splashpage before the campaign), track (show status, updates, information, contact information), closeout (Show results of campaign based upon completed data), off (show a simple splashpage saying thank you to contributors and we will be back next year).
