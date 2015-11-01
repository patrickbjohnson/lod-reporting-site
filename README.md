# lod-reporting-site
Life or Death Client Reporting Site


# Prerequisites 
1. [Composer](https://getcomposer.org/)
2. [Node](https://nodejs.org/en/)
3. [Grunt](http://gruntjs.com/getting-started)


# Installation
1. `git clone` repo
2. Set up local database - should be named `lod_reporting_site`
3. Set up `.env` file from `env.sample`
  Your .env should have the following: 
  
  ```
  ENV=local	
DB_NAME=lod_reporting_site
DB_USER=root
DB_PASSWORD=root
DB_HOST=localhost
```

4. Run `php composer.phar install` or `composer install` (this depends on how you've set it up locally)
5. `cd` into `wp-content/themes/life-or-death-client-reporting` and run `npm install`
6. Once the install runs successfully you should be able to run `grunt` to load up the appropriate site. 
7. Enter the site through your admin account.
8. Sync up ACF fields if needed. You can do so by clicking the `custom fields` tab at the bottom fo the wordpress admin panel
9. Create a user and give them the role of `client`
10. Create a report with dummy content to test. 

