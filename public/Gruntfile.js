module.exports = function (grunt) {
  grunt.initConfig({
  concat: {
    options: {
    },
    js: {
      src: ['jquery.min.js','bootstrap.min.js','angular.js','angular-sanitize.js','angular-ui-router.js','components/loadingbar/loading-bar.js'],
      dest: 'built.js'
    },
    'css':{
	src:['bootstrap.min.css','bootstrap-theme.min.css','home.css','components/loadingbar/loading-bar.css'],
        dest: 'built.css'
    }
  },
  uglify: {
     build: {
        src: 'built.js',
        dest: 'built.min.js'
      }
   },
   cssmin:{
	css:{
	    src:'built.css',
	    dest:'built.min.css'	
	}
   }
});
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-concat');
  
  grunt.loadNpmTasks('grunt-css');
  grunt.registerTask('default', ['concat','uglify','cssmin']);
}
