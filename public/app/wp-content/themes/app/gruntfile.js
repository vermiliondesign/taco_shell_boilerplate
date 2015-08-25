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
    options: {
      sourceMap: true
    },
    dist: {
      files: {
        '_/css/main.css': '_/scss/main.scss'
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
 
// load plugins here
grunt.loadNpmTasks('grunt-contrib-watch');
grunt.loadNpmTasks('grunt-sass');

 
// Default task(s).
grunt.registerTask('default', ['sass']);
grunt.registerTask('dev', ['watch']);
 
};