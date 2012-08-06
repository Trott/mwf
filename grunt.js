/*global module:false*/
module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    concat: {
      dist: {
        src: ['root/assets/js/core/modernizr.js',
              'root/assets/js/external/matchmedia.js',
              'dist/ucsf.partial.js'],
        dest: 'root/assets/js/ucsf.js'
      }
    },
    lint: {
      beforeconcat: ['grunt.js',
                      'root/assets/js/utility/analytics.src.js',
                      'root/assets/js/utility/template-2.0.0.js',
                      'root/assets/js/external/LightningTouch.js',
                      'root/assets/js/external/picturefill.js',
                      'root/assets/js/ucsf/mainPage.src.js',
                      'root/assets/js/ucsf/shuttle.src.js'],
      afterconcat: []
    },
    qunit: {
      files: []
    },
    min: {
      dist: {
        src: ['root/assets/js/utility/analytics.src.js',
              'root/assets/js/ucsf/template-2.0.0.js',
              'root/assets/js/external/LightningTouch.js',
              'root/assets/js/external/picturefill.js',
              'root/assets/js/ucsf/mainPage.src.js',
              'root/assets/js/ucsf/news.src.js',
              'root/assets/js/ucsf/shuttle.src.js'],
        dest: 'dist/ucsf.partial.js'
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
                Hogan:true,
                ucsf:true}
    },
    uglify: {}
  });

  // Default task.
  grunt.registerTask('default', 'lint:beforeconcat min concat');

};
