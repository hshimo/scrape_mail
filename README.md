# Scrape Mail: scrape_mail.php

# What's this?

This script scrapes a web page and sends the scraped content.

1. scrape a web page
2. send a e-mail with the scraped result

# How to download

1. Download ZIP file from https://github.com/hshimo/scrape_mail
2. git clone https://github.com/hshimo/scrape_mail.git


# How to install

1. Download a packed file.
2. Unpack the file.
3. That's all.

## How to configure

1. copy default mail setting file

```
% cd Config
% cp mail.default.php mail.my.php
```

2. edit a mail setting file. (ex. From, To, Subject, etc)
3. set send mail flag to true.

```
% cd Config
% vi init.php
```

change a following line:

```
   define('SM_SEND_MAIL_FLAG', false);
```


## How to use

### command line

Default:

```
% php ./scrape_mail.php
```

Select a controller. For example: Digg controller or Slashdot controller

```
% php ./scrape_mail.php -c digg
% php ./scrape_mail.php -c slashdot
```

Select a controller and a action. (not implemented yet)

```
% php ./scrape_mail.php -c digg -a index
```

## How to implement

1. make a FooController.php file under Controller directory.
2. make a FooModel.php file under Model directory.
3. implement

### cron

```
% crontab -e
```

```
# hourly
0 * * * * /usr/bin/php -f /home/user/scrape_mail/scrape_mail.php
```

## Requirement

only tested on

- PHP 5.3.15
- Mac OS X 10.6


## Contribution

Welcome!
- fork on GitHub
- send a pull request

## Change Log

- 2013-08-07: alpha version released


## TODO

- [] put the version
- [] get options from command line
- [] move get options function into Lib/
- [] implement verbose option
- [] implement help option
- [] view & template
- [] HTML mail
- [] beforeFilter, afterFilter
- [] only japanese locale for sendMail library
- [] write test case
- [] output to other resources (database, twitter, facebook)
