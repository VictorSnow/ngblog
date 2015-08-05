module.exports = function (grunt) {
  grunt.initConfig({
  concat: {
    options: {
    },
    dist: {
      src: ['jquery.min.js','bootstrap.min.js','angular.js','angular-sanitize.js','angular-ui-router.js'],
      dest: 'built.js'
    }
  },
  uglify: {
     build: {
        src: 'built.js',
        dest: 'built.min.js'
      }
   }
});
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-concat');
  
  grunt.registerTask('default', ['concat','uglify']);
}
