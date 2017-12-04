Nathalie Sian Création
=======================

A Symfony project created on August 11, 2017, 6:03 pm.

```
.-------------------------------------------------------------------------------.  
| .----------------------------------------------------------------------------.  |  
| |  _______     _________       __       ________    ____    ____  _________   | |  
| | |_   __ \   |_   ___  |     /  \     |_   ___ `. |_   \  /   _||_   ___  |  | |  
| |   | |__) |    | |_  \_|    / /\ \      | |   `. \  |   \/   |    | |_  \_|  | |  
| |   |  __ /     |  _|  _    / ____ \     | |    | |  | |\  /| |    |  _|  _   | |  
| |  _| |  \ \_  _| |___/ | _/ /    \ \_  _| |___.' / _| |_\/_| |_  _| |___/ |  | |  
| | |____| |___||_________||____|  |____||________.' |_____||_____||_________|  | |  
| |                                                                             | |  
| '-----------------------------------------------------------------------------' |  
 '-------------------------------------------------------------------------------'

```


    ## **Instructions utilisateur :**
    
     - _**Installation :**_
     Ouvrez un terminal, déplacez-vous dans le dossier où vous souhaitez cloner le projet et copiez les lignes de code suivantes
      !! Assurez vous d'avoir paramètré une version récente de GIT et COMPOSER !! :
    	1. ^$ git@github.com:juliengrima/sian.git 
    	ou
    	2. ^$ git clone https://github.com/sian.git`
    	3. ^$ cd sian
    	4. ^$ composer install 
    	        (Suivez les instructions succédant l'installation du composer)
    	5. ^$ composer dump-autoload 
                (Evite certain problèmes de bundles avec Symfony 3.3.6)
    	6. ^$ php bin/console d:d:c 
    	        (Création de la base de données)
    	7. ^$ php bin/console d:s:u --force
    	        (Enregistrement des tables dans la base de données)
    	8. ^$ php bin/console a:i --symlink 
    	        (Non obligatoire car le dossier PUBLIC est directement dans le web) 
    	

## Lors de la création d'un nouveau bundle:

Ajouter le namespace dans COMPOSER.JSON


    "autoload": { 

    "psr-4": { 
    ================================================================
    ---> "AppBundle\\": "src/AppBundle", 
         "BlogBundle\\": "src/BlogBundle", 
         "DemoBundle\\": "src/DemoBundle"
    ================================================================

    }, 

    "classmap": [ "app/AppKernel.php", "app/AppCache.php" ] },
    
Dans la console taper:  

    $ composer dump-autoload

Le Bundle est activé 


```
                               ,|     
                             //|                              ,|
                           //,/                             -~ |
                         // / |                         _-~   /  ,
                       /'/ / /                       _-~   _/_-~ |
                      ( ( / /'                   _ -~     _-~ ,/'
                       \~\/'/|             __--~~__--\ _-~  _/,
               ,,)))))));, \/~-_     __--~~  --~~  __/~  _-~ /
            __))))))))))))));,>/\   /        __--~~  \-~~ _-~
           -\(((((''''(((((((( >~\/     --~~   __--~' _-~ ~|
  --==//////((''  .     `)))))), /     ___---~~  ~~\~~__--~ 
          ))| @    ;-.     (((((/           __--~~~'~~/
          ( `|    /  )      )))/      ~~~~~__\__---~~__--~~--_
             |   |   |       (/      ---~~~/__-----~~  ,;::'  \         ,
             o_);   ;        /      ----~~/           \,-~~~\  |       /|
                   ;        (      ---~~/         `:::|      |;|      < >
                  |   _      `----~~~~'      /      `:|       \;\_____// 
            ______/\/~    |                 /        /         ~------~
          /~;;.____/;;'  /          ___----(   `;;;/               
         / //  _;______;'------~~~~~    |;;/\    /          
        //  | |                        /  |  \;;,\              
       (<_  | ;                      /',/-----'  _>
        \_| ||_                     //~;~~~~~~~~~ 
            `\_|                   (,~~ 
                                    \~\ 
                                     ~~ 
```
