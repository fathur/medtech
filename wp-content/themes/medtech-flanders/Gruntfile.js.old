module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		concat: {
			js: {
				src: ['js/src/*.js'],
				dest: 'js/medtech-flanders.js'
			}
		},

		uglify: {
			options: {
				banner: '/*! <%= pkg.name %> - v<%= pkg.version %> - ' +
					'<%= grunt.template.today("yyyy-mm-dd") %> */ \n',
				mangle: false
			},
			js: {
				src: ['js/medtech-flanders.js'],
				dest: 'js/medtech-flanders.min.js'
			}
		},

		sass: {
			dist: {
				options: {
					style: 'compressed'
				},
				src: 'sass/main.scss',
				dest: 'css/medtech-flanders.css'
			}
		},

		watch: {
			concat: {
				files: ['<%= concat.js.src %>'],
				tasks: ['concat']
			},
			uglify: {
				files: ['<%= concat.js.src %>'],
				tasks: ['uglify']
			},
			sass: {
				files: ['sass/*.scss'],
				tasks: ['sass']
			},
			all: {
				files: 'index.html',
				options: {
					livereload: true
				}
			}
		},

		// grunt-express will serve the files from the folders listed in `bases`
		// on specified `port` and `hostname`
		express: {
			all: {
				options: {
					port: 9000,
					hostname: "0.0.0.0",
					bases: ['G:\\Conf\\Web\\Apache\\medtech-flanders\\design'], 	// Replace with the directory you want the files served from
												// Make sure you don't use `.` or `..` in the path as Express
												// is likely to return 403 Forbidden responses if you do
												// http://stackoverflow.com/questions/14594121/express-res-sendfile-throwing-forbidden-error
					livereload: true
				}
			}
		},

		// grunt-open will open your browser at the project's URL
		open: {
			all: {
				// Gets the port from the connect configuration
				path: 'http://localhost:<%= express.all.options.port%>'
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-watch');

	// Load Grunt tasks declared in the package.json file
	require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

	grunt.registerTask('default', [
		'concat',
		'sass',
		'uglify',

		'express',
		'open',
		'watch',
	]);
}