#LRES PTO Superhero Fun Run Facebook App
This single page application is used to support the LRES PTO Fun Run Facebook App which is used to share information on the status and progress of the LRES PTO Fun Run donation drive.

##About

This project started as a fork from another project designed around a single page PHP Slim application to be put on shared hosting. It has now matured to include Test Automation and Continuous Integration principles.

##Dependencies

1. PHP 5.6 or greater
2. phing
3. Composer
4. pear (Net_FTP)
5. bowerphp


##Run locally

  php -S localhost:8000

URL:[http://localhost:8000/](http://localhost:8000/)





##CI/CD (Phing) Configuration
This was written using the Dreamhost shared platform, which is cheap and easy. Once you have setup your domain/subdomain, you can setup continuous integration leveraging git and phing.


1. clone branch to remote location that you want to deploy to. For example, I cloned "Dev" to my testfunrunfbapp directory (I know...you say dev, but it is test....yeah yeah.....). So I just ran:


    git clone https://github.com/davidlarrimore/lresptofunrun.git ./
    git checkout dev  # <-- name of the branch I wanted


2. come up with a name for that environment, and be consistent! (I consistently chose dev, which is probably confusing)






This project started as a fork from another project designed around a single page PHP Slim application to be put on shared hosting. It has now matured to include Test Automation and Continuous Integration principles.





##TODO

1. Make the website configurable so I can easily setup phases that use the system dates to determine which page to show. Phases should be prepare (Show a simple splashpage before the campaign), track (show status, updates, information, contact information), closeout (Show results of campaign based upon completed data), off (show a simple splashpage saying thank you to contributors and we will be back next year).
