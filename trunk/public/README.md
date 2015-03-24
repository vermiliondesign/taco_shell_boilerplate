## TACO SHELL
## A Frontend and Backend project-starter for WordPress
## BACKEND
## tacowordpress Project Starter

## Theme Requirements (to install the vendor directory with tacowordpress):

* [Composer](https://getcomposer.org/) Install Composer (globally installs so you can run it locally, on a project-to-project basis)

## To ensure all the counterparts are installed, run
* composer -v

## To begin a new WordPress Project:

1. cd into the public directory, where the composer.json file is





## FRONTEND
## Grunt / SASS Project Starter

## Theme Requirements (to compile with grunt):

* [Node.js](http://nodejs.org) Install Node (globally installs so you can run it locally, on a project-to-project basis)
* [Grunt](http://gruntjs.com) Install Grunt: npm install -g grunt-cli (globally installs so you can run it locally, on a project-to-project basis)
* [Sass](http://sass-lang.com) Install SASS: gem install sass (globally installs so you can run it locally, on a project-to-project basis)
* [Compass](http://compass-style.org) Install Compass: gem install compass (globally installs so you can run it locally, on a project-to-project basis)

## To ensure all the counterparts are installed, run

* sass -v
* npm -v
* compass -v

## To Compile SCSS with Grunt:

1. cd into the themes' app directory, where the gruntfile.js and the package.json files are
    1a. run 'npm install' to install the node_modules (including grunt and compass, as defined on the package.json in themes' app directory)
    1b. run 'grunt' (default task for grunt, as defined on gruntfile.js in themes' app directory)
    1c. run 'grunt dev' (task setup to run the watch task, as defined on gruntfile.js in themes' app directory)

## To Compile SCSS without npm/grunt/compass:

1. cd into the themes' app directory, where the gruntfile.js and the package.json files are
    1a. inside the themes' app directory
    1b. on _/scss/main.scss, comment out the @include 'compass' on main.scss
    1c. run 'sass --watch _/scss/main.scss:_/css/main.css'
    
    
