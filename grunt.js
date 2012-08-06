/*global module:false*/
module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    concat: {
      dist: {
        src: ['root/assets/js/core/modernizr.js',
              'root/assets/js/utility/analytics.js',
              'root/assets/js/ucsf/template-2.0.0.min.js',
              'root/assets/js/ucsf/LightningTouch-1.0.3.min.js',
              'root/assets/js/ucsf/mainPage.js',
              'root/assets/js/ucsf/news.js',
              'root/assets/js/ucsf/shuttle.js'],
        dest: 'dist/ucsf.js'
      }
    },
    lint: {
      beforeconcat: ['grunt.js'],
      afterconcat: []
    },
    qunit: {
      files: []
    },
    min: {
      dist: {
        src: [],
        dest: '/dev/null'
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
  grunt.registerTask('default', 'lint:beforeconcat concat');

};
