var sourceDirectory = 'bower_components';
var targetDirectory = 'web/assets';

module.exports = function (grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        bowercopy: {
            options: {
                srcPrefix: sourceDirectory,
                destPrefix: targetDirectory
            },
            scripts: {
                files: {
                    'js/jquery.js': 'jquery/dist/jquery.js',
                    'js/bootstrap.js': 'bootstrap/dist/js/bootstrap.js'
                }
            },
            stylesheets: {
                files: {
                    'css/bootstrap.css': 'bootstrap/dist/css/bootstrap.css',
                    'css/font-awesome.css': 'font-awesome/css/font-awesome.css'
                }
            },
            fonts: {
                files: {
                    'fonts': 'font-awesome/fonts',
                    'fonts': 'bootstrap/fonts'
                }
            }
        },
        cssmin : {
            bundled:{
                src: targetDirectory + '/css/bundled.css',
                dest: targetDirectory + '/css/bundled.min.css'
            }
        },
        uglify : {
            js: {
                files: {
                    'web/assets/js/bundled.min.js': [targetDirectory + '/js/bundled.js']
                }
            }
        },
        concat: {
            options: {
                stripBanners: true
            },
            css: {
                src: [
                    targetDirectory + '/css/bootstrap.css',
                    targetDirectory + '/css/font-awesome.css'
                ],
                dest: targetDirectory + '/css/bundled.css'
            },
            js : {
                src : [
                    targetDirectory + '/js/jquery.js',
                    targetDirectory + '/js/bootstrap.js',
                    targetDirectory + '/js/material.js'
                ],
                dest: targetDirectory + '/js/bundled.js'
            }
        },
        watch: {
            files: [sourceDirectory + '/**/*.js'],
            tasks: ['default']
        }
    });
    grunt.event.on('watch', function(action, filepath, target) {
        grunt.log.writeln(target + ': ' + filepath + ' has ' + action);
    });

    grunt.loadNpmTasks('grunt-bowercopy');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('default', ['bowercopy', 'concat', 'cssmin', 'uglify']);
};
