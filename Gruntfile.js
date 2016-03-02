module.exports =function (grunt) {
  'use strict';

  // Force use of Unix newlines
  grunt.util.linefeed = '\n';

  // globs where our JS files are found - used below in uglify and watch
  var jsFilePaths = [
    'js/*.js',
    'js/app/*.js',
    'js/app/modules/*.js'
  ];

  // Project configuration
  grunt.initConfig({

    // you can read in JSON files, which are then set as objects. We use this below with banner
    pkg: grunt.file.readJSON('package.json'),

    // setup some variables that we'll use below
    appDir: 'web/assets',
    builtDir: 'web/assets-built',

    requirejs:{
      // creates a "main" requirejs sub-task (grunt requirejs:main)
      // we *could* have other sub-tasks for using requirejs with other
      // files or configuration
      main:{
        options:{
          mainConfigFile: '<%= appDir %>/js/common.js',
          appDir: '<%= appDir %>',
          baseUrl: './js',
          dir: '<%= builtDir %>',
          // will be taken care of with less
          optimizeCss: "none",
          // will be taken care of with an uglify task directly
          optimize: "none",

          /**
           * The list of modules that should have their dependencies packed into them.
           *
           * For each module listed here, Require.js will read
           * that modules dependencies and package them in the
           * file. It will additionally add in any modules (and
           * their dependencies) specified in the "include" and
           * exclude any modules (and their dependencies) specified
           * in "exclude".
           */
          modules: [
            // First set up the common build layer.
            {
              // module names are relative to baseUrl
              name: 'common',
              // List common dependencies here. Only need to list
              // top level dependencies, "include" will find
              // nested dependencies inside each of these
              include: ['jquery', 'angular-material']
            },

            // Now set up a build layer for each page, but exclude
            // the common one. "exclude" will exclude nested
            // the nested, built dependencies from "common". Any
            // "exclude" that includes built modules should be
            // listed before the build layer that wants to exclude it.
            // "include" the appropriate "app/main*" module since by default
            // it will not get added to the build since it is loaded by a nested
            // require in the page*.js files.
            {
              // module names are relative to baseUrl/paths config
              name: 'app/modules/validation',
              exclude: ['common']
            },
            {
              name: 'app/modules/frontend',
              exclude: ['common']
            },
            {
              name: 'app/modules/backend',
              exclude: ['common']
            }
          ]
        }
      }
    },

    uglify: {
      options: {
        // a cute way to put a banner on each uglified file
        banner: '/*! <%= pkg.name %> \npkg.version \n<%= grunt.template.today("yyyy-mm-dd") %> */\n'
      },
      build: {
        /*
         * I'm not sure if finding files recursively is possible. This is
         * a bit ugly, but it accomplishes the task of finding all files
         * in the built directory (that we want) and uglifying them.
         *
         * Additionally, I created a little self-executing function
         * here so that I could re-use the jsFilePaths from above
         *
         * https://github.com/gruntjs/grunt-contrib-uglify/issues/23
         */
        files: (function() {

          var files = [];
          jsFilePaths.forEach(function(val) {
            files.push({
              expand: true,
              cwd: '<%= builtDir %>',
              src: val,
              dest: '<%= builtDir %>'
            });
          });

          return files;
        })()
      }
    },

    // Make sure code styles are up to par and there are no obvious mistakes
    jshint: {
      options: {
        //reporter: require('jshint-stylish')
      },
      all: [
        'Gruntfile.js',
        '<%= appDir %>/js/{,*/}*.js'
      ]
    },

    less:{
      // the "development" build subtask (grunt less:dev)
      dev: {
        options: {
          compress: false,
          optimization: 2
        },
        // Indicar la ruta de los archivos LESS y que compile recursivamente los ficheros que encuentre
        files: [{
          // no need for files, the config below should work
          expand: true,
          cwd:    '<%= appDir %>/less',
          src:    ['**/*.less', '!**/{variables,mixin}*.less'],
          //dest:   '<%= builtDir %>/css',
          dest:   '<%= appDir %>/less',
          ext:    '.css'
        },{
          // no need for files, the config below should work
          expand: true,
          cwd:    '<%= appDir %>/bundles',
          src:    ['**/*.less', '!**/{variables,mixin}*.less'],
          //dest:   '<%= builtDir %>/css',
          dest:   '<%= appDir %>/bundles',
          ext:    '.css'
        }]
      },

      prod: {
        options: {
          cleancss: true,
          sourceMap: true,
          sourceMapFilename: '<%= builtDir %>/css/rooms.css.map',
          sourceMapBasepath: '<%= builtDir %>/css/'
        },
        // Indicar la ruta de los archivos LESS y que compile recursivamente los ficheros que encuentre
        files: [{
          // no need for files, the config below should work
          expand: true,
          cwd:    '<%= appDir %>/less',
          src:    ['**/*.less', '!{variables,mixin}*.less'],
          //dest:   '<%= builtDir %>/css',
          dest:   '<%= builtDir %>/less',
          ext:    '.css'
        },{
          // no need for files, the config below should work
          expand: true,
          cwd:    '<%= appDir %>/bundles',
          src:    ['**/*.less', '!{variables,mixin}*.less'],
          dest:   '<%= builtDir %>/bundles',
          ext:    '.css'
        }]
      }
    },

    // run "Grunt watch" and have it automatically update things when files change
    watch: {
      // watch all JS files and run jshint
      scripts: {
        // self executing function to reuse jsFilePaths, but prefix each with appDir
        files: (function() {
          var files = [];
          jsFilePaths.forEach(function(val) {
            files.push('<%= appDir %>/'+val);
          });

          return files;
        })(),
        tasks: ['jshint'],
        options: {
          spawn: false
        }
      },

      // watch all .less files and run less:dev
      styles: {
        // Which files to watch (all .less files recursively in the less directory)
        //files: ['<%= appDir %>/less/**/*.less'],
        files: ['<%= appDir %>/**/*.less'],
        tasks: ['less:dev'],
        options: {
          nospawn: true
        }
      },

      synchronization: {
        files: ['**'],
        tasks: ['sync'],
        options: {
          nospawn: true
        }
      }
    },

    // Configuracion de la tarea para la sincronizacion de los directorios
    sync: {
      main: {
        files: [{
          cwd: '<%= appDir %>',
          src: [
            '**', /* Include everything */
            '!**/*.txt' /* but exclude txt files */
          ],
          dest: '<%= builtDir %>'
        }],
        verbose: true // Display log messages when copying files
      }
    }
  });

  // Load tasks from our external plugins. These are what we're configuring above
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-requirejs');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-watch');

  // load task to syncronize directories (watch assets and sync with assets-built)
  //grunt.loadNpmTasks('grunt-sync');

  // the "default" task (e.g. simply "Grunt") runs tasks for development
  grunt.registerTask('default', ['jshint', 'less:dev']);

  // register a "production" task that sets everything up before deployment
  // to excecute task run: grunt production
  grunt.registerTask('production', ['jshint', 'requirejs', 'uglify', 'less:prod']);

  // Execute this task in development environment
  grunt.registerTask('dev', ['jshint', 'requirejs', 'less:dev']);
};
