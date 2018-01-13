var gulp = require('gulp');
var runSequence = require('run-sequence');
var cfg = require('../package.json').config;

gulp.task('build', function () {
  runSequence(

    'sass',
    'copy'
    //'server',
    //'copy:watch',
    //'sass:watch'
  )
});


gulp.task('watch', function () {
    gulp.watch(cfg.src.sass + '/**/*.{scss,sass}', ['sass']);


});
