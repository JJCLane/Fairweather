module.exports = function(grunt) {

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        concat: {
            dist: {
		      src: ['js/plugins.js', 'js/script.js'],
		      dest: '../public/js/script.js'
		    }
        },
        
        jshint: {
		  files: ['js/*.js'],
		},

		uglify: {
			my_target: {
				files: {
					'../public/js/script.js': '../public/js/script.min.js'
				}
			}
		},
		
		imagemin: {
		    dynamic: {
		    	options: {
			        optimizationLevel: 7
			    },
		        files: [{
		            expand: true,
		            cwd: '../public/img/',
		            src: ['**/*.{png,jpg,gif}'],
		            dest: '../public/img/'
		        }]
		    }
		},

		compass: {
			dist: {
	        	options: {
	        		sassDir: 'SASS',
	        		cssDir: '../public/css/',
	        		environment: 'production',
	        		outputStyle: 'compressed'
	        	},
	        },
	        dev: {
	        	options: {
	        		sassDir: 'SASS',
	        		cssDir: '../public/css/',
	        		environment: 'development',
	        		outputStyle: 'expanded'
	        	},
	        }
	    },
	    
	    autoprefixer: {
			single_file: {
				options: {
					browsers: ['last 2 versions', 'ie 8', 'ie 9']
				},
				src: '../public/css/style.css',
				dest: '../public/css/style.css'
		    },
		},
		
		watch: {
			options: {
		        livereload: true,
		    },
		    scripts: {
		    	files: 'js/{,*/}*.js',
		        tasks: ['jshint', 'concat'],
		        options: {
		        	style: 'compressed',
		            spawn: false,
		        },
		    },
		    sass: {
			    files: ['SASS/**/*.{scss,sass}'],
			    tasks: ['compass:dev', 'autoprefixer'],
			    options: {
			        spawn: false,
			    }
			}
		}

    });

    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-autoprefixer');

    grunt.registerTask('default', ['watch']);
    grunt.registerTask('deploy', ['concat', 'uglify', 'imagemin', 'compass:dist']);

};