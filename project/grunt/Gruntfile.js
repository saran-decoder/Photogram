module.exports = function(grunt){
    
    var currentdate = new Date(); 
    var datetime = currentdate.getDate() + "/"
    + (currentdate.getMonth()+1)  + "/" 
    + currentdate.getFullYear() + " @ "  
    + currentdate.getHours() + ":"  
    + currentdate.getMinutes() + ":" 
    + currentdate.getSeconds(); 
    
    grunt.initConfig({
        concat: {
            options: {
                separator: '\n',
                sourceMap: true,
                banner: "/*Processed by SNA Labs on "+datetime+"*/\n"
            },
            css: {
                src: [
                    '../css/**/*.css'
                ],
                dest: 'dist/style.css',
            },
            js: {
                src: [
                    '../js/**/*.js'
                ],
                dest: 'dist/app.js'
            }
        },
        cssmin: {
            options: {
                mergeIntoShorthands: false,
                roundingPrecision: -1
            },
            target: {
                files: {
                    '../../htdocs/css/style.css': ['dist/style.css']
                }
            }
        },
        uglify: {
            minify: {
                options: {
                    sourceMap: true,
                },
                files: {
                    '../../htdocs/js/app.min.js': ['dist/app.js']
                }
            }
        },
        copy: {
            jquery: {
                files: [
                    // {
                    //     expand: true, 
                    //     flatten: true,
                    //     filter: 'isFile',
                    //     src: ['bower_components/jquery/dist/*'], 
                    //     dest: '../../htdocs/js/jquery/'
                    // },
                ],
            },
        },
        obfuscator: {
            options: {
                banner: '// obfuscated with grunt-contrib-obfuscator.\n',
                debugProtection: true,
                debugProtectionInterval: true,
                domainLock: ['photogram.saran.com']
            },
            task1: {
                options: {
                    // options for each sub task
                },
                files: {
                    '../../htdocs/js/app.o.js': [
                        'dist/app.js',
                    ]
                }
            }
        },
        watch: {
            css: {
                files: [
                    '../css/**/*.css',
                ],
                tasks: ['concat:css', 'cssmin'],
                options: {
                    spawn: false,
                },
            },
            js: {
                files: [
                    '../js/**/*.js'
                ],
                tasks: ['concat:js', 'uglify', 'obfuscator'],
                options: {
                    spawn: false,
                },
            },
        },
    });
    
    grunt.loadNpmTasks('grunt-contrib-obfuscator');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.registerTask('default', ['copy', 'concat', 'cssmin', 'uglify','obfuscator', 'watch']);
};