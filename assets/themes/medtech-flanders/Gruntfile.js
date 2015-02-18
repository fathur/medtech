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
		'watch',
	]);
}