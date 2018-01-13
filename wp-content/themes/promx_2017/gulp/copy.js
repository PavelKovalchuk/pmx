var gulp = require('gulp'),
cfg = require('../package.json').config;

gulp.task('copy', function () {
    return gulp.src('./src/**/*')
    .pipe(gulp.dest('./app/'));
});

gulp.task('copy:watch', function () {
    gulp.watch(cfg.base + '/**/*.*', ['copy']);
  });