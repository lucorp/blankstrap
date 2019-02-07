module.exports = function(grunt) {

    grunt.initConfig({
	copy: {
	    main: {
		files: [
		    {expand: true, flatten: true, src: 'node_modules/bootstrap/dist/css/bootstrap.min.css', dest: 'blankstrap-master/assets/css/'},
		    {expand: true, flatten: true, src: 'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', dest: 'blankstrap-master/assets/js/'},
		    {expand: true, flatten: true, src: 'node_modules/jquery/dist/jquery.min.js', dest: 'blankstrap-master/assets/js/'},
		    {expand: true, flatten: true, src: 'node_modules/font-awesome/css/font-awesome.css', dest: 'blankstrap-master/assets/css/'},
		],
	    },
	},
    });
    
    grunt.loadNpmTasks('grunt-copy');

    grunt.registerTask('default', ['copy']);

};
