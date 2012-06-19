/*global module:false*/
module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    meta: {
      version: '0.1.0',
      banner: '/*! UCSF Mobile - v<%= meta.version %> - ' +
      '<%= grunt.template.today("yyyy-mm-dd") %>\n' +
      '* http://m.ucsf.edu/\n' +
      '* Copyright (c) <%= grunt.template.today("yyyy") %> ' +
      'Rich Trott; Licensed BSD */'
    },
    concat: {
      dist: {
        src: ['root/assets/js/utility/analytics.src.js',
              'root/assets/js/ucsf/mainPage.src.js',
              'root/assets/js/ucsf/news.src.js'],
        dest: 'dist/ucsf.js'
      }
    },
    lint: {
      beforeconcat: ['grunt.js'],
      afterconcat: ['dist/ucsf.js']
    },
    qunit: {
      files: ['root/assets/test/**/*.html']
    },
    // concat: {
    //   dist: {
    //     src: ['root/assets/js/core/modernizr.js',
    //           'root/assets/js/utility/analytics.src.js',
    //           'root/assets/js/ucsf/template-2.0.0.min.js',
    //           'root/js/ucsf/LightningTouch-1.0.3.min.js',
    //           'root/assets/js/ucsf/mainPage.src.js',
    //           'root/assets/js/ucsf/news.src.js'],
    //     dest: 'root/assets/js/main.js'
    //   }
    // },
    min: {
      dist: {
        src: ['<banner:meta.banner>', '<config:concat.dist.dest>'],
        dest: 'dist/FILE_NAME.min.js'
      }
    },
    watch: {
      files: '<config:lint.files>',
      tasks: 'lint qunit'
    },
    jshint: {
      options: {
        curly: true,
        eqeqeq: true,
        immed: true,
        latedef: true,
        newcap: true,
        noarg: true,
        sub: true,
        undef: true,
        boss: true,
        eqnull: true,
        browser: true
      },
      globals: {Modernizr:true,
                google:true,
                Hogan:true}
    },
    uglify: {}
  });

  // Default task.
  grunt.registerTask('default', 'lint:beforeconcat concat lint:afterconcat min qunit');

};
