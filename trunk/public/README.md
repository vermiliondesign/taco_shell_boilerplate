## TACO SHELL
A Frontend and Backend Project-Starter for WordPress. Frontend: compiles SASS with grunt. Backend: hooked up with tacowordpress.

## BACKEND Setup
tacowordpress Project Starter

# Theme Requirements (to install the vendor directory with tacowordpress):

* [Composer](https://getcomposer.org/) Install Composer (globally installs so you can run it locally, on a project-to-project basis)

# To ensure all the counterparts are installed, run
* composer -v

# To begin a new WordPress Project:

1. cd into the public directory, where the composer.json file is
  1a. run 'composer install' to install the vendor directory
  
This installs tacowordpress. [See the github page for more info](https://github.com/tacowordpress/tacowordpress). Tacowordpress is managed by Brian Haveri on Packagist, [here](https://packagist.org/packages/tacowordpress/tacowordpress), and is a similar plugin to [ACF](http://www.advancedcustomfields.com/), but puts Meta Box & Custom Fields creation and "Management" to the backend, not in the Dashboard.


## FRONTEND Setup
Grunt / SASS Project Starter

# Theme Requirements (to compile with grunt):

* [Node.js](http://nodejs.org) Install Node (globally installs so you can run it locally, on a project-to-project basis)
* [Grunt](http://gruntjs.com) Install Grunt: npm install -g grunt-cli (globally installs so you can run it locally, on a project-to-project basis)
* [Sass](http://sass-lang.com) Install SASS: gem install sass (globally installs so you can run it locally, on a project-to-project basis)
* [Compass](http://compass-style.org) Install Compass: gem install compass (globally installs so you can run it locally, on a project-to-project basis)

# To ensure all the counterparts are installed, run

* sass -v
* npm -v
* compass -v

# To Compile SCSS with Grunt:

1. cd into the themes' app directory, where the gruntfile.js and the package.json files are
    1a. run 'npm install' to install the node_modules directory (including grunt and compass, as defined on the package.json in themes' app directory)
    1b. run 'grunt' (default task for grunt, as defined on gruntfile.js in themes' app directory)
    1c. run 'grunt dev' (task setup to run the watch task, as defined on gruntfile.js in themes' app directory)

# To Compile SCSS without npm/grunt/compass:

1. cd into the themes' app directory, where the gruntfile.js and the package.json files are
    1a. inside the themes' app directory
    1b. on _/scss/main.scss, comment out the @include 'compass' on main.scss
    1c. run 'sass --watch _/scss/main.scss:_/css/main.css'
    

## MISC Info about Setup

The main root directory is as follows:

-/app (includes wp-content, .htaccess, favicons, wp-config.php)
-/vendor (taco)
-/wordpress-x.x
-wordpress (symlink)

This site uses a "wp-fresh" approach and uses symlinks to extrapolate the main custom "app" from the "wordpress core". Below is a list of the symlink configurations:

ln -s wordpress-4.1 wordpress

Once you cd into the wordpress-x.x directory:

ln -s ../app/.htaccess .htaccess
ln -s ../app/favicon.ico favicon.ico
ln -s ../app/apple-touch-icon.png apple-touch-icon.png
ln -s ../app/apple-touch-icon-72x72.png apple-touch-icon-72x72.png
ln -s ../app/apple-touch-icon-120x120.png apple-touch-icon-120x120.png
ln -s ../app/apple-touch-icon-152x152.png apple-touch-icon-152x152.png
ln -s ../app/wp-config.php wp-config.php
ln -s ../app/wp-content wp-content

This is done to make wordpress updates easier. Simply download the new version of wordpress and add it to the public directory (as wordpress-x.x). Update the above symlinks to point to the new wordpress update, and voila! hassle-free update, with an easy fallback incase things get silly.
    
    
