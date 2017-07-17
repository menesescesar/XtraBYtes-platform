## XtraBYtes platform Laravel

XtraBYtes platform is a web application developed to provide XBY users and network a set of functionalities around the technology. 

![Login](http://i.imgur.com/tPYVown.png)

![Dashboard](http://i.imgur.com/WfdYriQ.png)

## How to Install

    #1 - Copy repo
     
    #2 - composer install
            
    #3 - npm install
     
    #4 - get some recaptcha keys: https://www.google.com/recaptcha/admin
     
    #5 - config .env, Database user and pass, Mail Driver (check out zoho mail)
         
    #6 - php artisan migrate
         
    #7 - php artisan db:seed
     
    #8 - php artisan schedule:run
         
    #9 - login with given user, change email and password.
     
    #10 - Add this line to linux crontab: 
        * * * * * php /<path-to-project-folder>/artisan schedule:run

## Contribute

XBY: B5JZ8d7QthfxKKPADhBcRrhwep9PrnsD4H 

BTC: 1CBLZNrBL4TrGPyTs5bkZEtZm9pFCqcbUw

## Security

If you discover a security vulnerability please contact.

## Next Steps

1 - Install blockchain daemon on server and integrate its info via rpc calls to create an advanced explorer(simillar to https://blockchain.info).

2 - Build an API for external apps to access blockchain info.

## License

The XtraBYtes platform is open-source software licensed under the [MIT license](http://opensource.org/licenses/MIT).
