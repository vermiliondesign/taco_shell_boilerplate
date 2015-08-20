# TACO SHELL WP BOILERPLATE
A Frontend and Backend Project-Starter for WordPress.
Frontend: compiles SASS with Grunt.
Backend: build CPT's and CF's with CRUD-like methodology, using tacowordpress.

## BACKEND Setup
tacowordpress Project Starter

##### Theme Requirements (to install the vendor directory with tacowordpress):

* [Composer](https://getcomposer.org/) Install Composer (globally installs so you can run it locally, on a project-to-project basis)

To ensure all the counterparts are installed, run
* composer -v

##### To begin a new WordPress Project:

1. cd into the public directory, where the composer.json file is
  * run 'composer install' to install the vendor directory
  
This installs tacowordpress. [See the github page for more info](https://github.com/tacowordpress/tacowordpress). Tacowordpress is managed by Brian Haveri on Packagist, [here](https://packagist.org/packages/tacowordpress/tacowordpress), and is a similar plugin to [ACF](http://www.advancedcustomfields.com/), but puts Meta Box & Custom Field creation and "Management" to the backend, not in the Dashboard.


## FRONTEND Setup
Grunt / SASS Project Starter

##### Theme Requirements (to compile SASS with grunt):

* [Node.js](http://nodejs.org) Install Node (globally installs so you can run it locally, on a project-to-project basis)
* [Grunt](http://gruntjs.com) Install Grunt: npm install -g grunt-cli (globally installs so you can run it locally, on a project-to-project basis)
* [Sass](http://sass-lang.com) Install SASS: gem install sass (globally installs so you can run it locally, on a project-to-project basis)

To ensure all the counterparts are installed, run

* sass -v
* npm -v

##### To Compile SCSS with Grunt:

1. cd into the themes' app directory, where the gruntfile.js and the package.json files are
  * run 'npm install' to install the node_modules directory (including grunt and compass, as defined on the package.json in themes' app directory)
  * run 'grunt' (default task for grunt, as defined on gruntfile.js in themes' app directory)
  * run 'grunt dev' (task setup to run the watch task, as defined on gruntfile.js in themes' app directory)

##### To Compile SCSS without npm/grunt/compass:

1. cd into the themes' app directory, where the gruntfile.js and the package.json files are
  * inside the themes' app directory
  * on _/scss/main.scss, comment out the @include 'compass' on main.scss
  * run 'sass --watch _/scss/main.scss:_/css/main.css'


## When Frontend & Backend are Ready...

* setup your host and vhost to point to project-name/trunk/public/wordpress
* create db locally, update app/wp-config.php
* hitting the project-name's localhost will append -4.1.1/wp-admin/install.php to your localhost, simply remove that and enter /wp-admin and it will setup the db for the first time
#### Once logged into the dashboard,
* go to Plugins-> activate "taco_app" first,
* then activate "taco_theme_option"
* go to Appearance -> Themes (activate "App")
* get to work!
* see tacowordpress docs for more info on building quickly and efficiently
* (http://tacowordpress.github.io/tacowordpress/).


###### MISC Information about the Setup:

The main root directory is as follows:

* /app (includes wp-content, .htaccess, favicons, wp-config.php)
* /vendor (taco)
* /wordpress-x.x
* wordpress (symlink that points to wordpress-x.x)
* composer.json

This site uses a "wp-fresh" approach and uses symlinks to extrapolate/isolate the main custom "app" from the "wordpress core". To see the taco shell boilerplate without symlinks, check out this github page(insert symlink-less taco project here).

###### Below is a list of the symlink configurations in this project:

* ln -s wordpress-4.1 wordpress

Once you cd into the wordpress-x.x directory:

* ln -s ../app/.htaccess .htaccess
* ln -s ../app/favicon.ico favicon.ico
* ln -s ../app/apple-touch-icon.png apple-touch-icon.png
* ln -s ../app/apple-touch-icon-72x72.png apple-touch-icon-72x72.png
* ln -s ../app/apple-touch-icon-120x120.png apple-touch-icon-120x120.png
* ln -s ../app/apple-touch-icon-152x152.png apple-touch-icon-152x152.png
* ln -s ../app/wp-config.php wp-config.php
* ln -s ../app/wp-content wp-content

This is done to make wordpress updates easier. Simply download the new version of wordpress and add it to the public directory (as wordpress-x.x). Update the above symlinks to point to the new wordpress update, and voila! Hassle-free update, with an easy fallback, in-case things get silly during the update.
    
    
