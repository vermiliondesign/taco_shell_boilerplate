/*
 * Vermilion Gruntfile
 * http://vermilion.com
 */
 
'use strict';
 
/**
 * Grunt Module
 */
module.exports = function(grunt) {
 
// Project configuration.
grunt.initConfig({
  pkg: grunt.file.readJSON('package.json'),
  sass: {
    dist: {
      files: {
        '_/css/main.css' : '_/scss/main.scss'
      }
    }
  },
  watch: {
    gruntfile: {
      files: ['gruntfile.js']
    },
    templates: {
      files: ['*.html', '*.php'],
      options: {
        spawn: false,
        livereload: true
      }
    },
    styles: {
      files: ['_/scss/*.scss'],
      tasks: ['sass'],
      options: {
        spawn: false,
        livereload: true,
      }
    }
  }
});
 
// Load plugins here
grunt.loadNpmTasks('grunt-contrib-sass');
grunt.loadNpmTasks('grunt-contrib-watch');

 
// Default task(s).
grunt.registerTask('default', ['sass']);
grunt.registerTask('dev', ['watch']);
 
};