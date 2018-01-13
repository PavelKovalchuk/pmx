var gulp = require('gulp'),
  sass = require('gulp-sass'),
  postcss = require('gulp-postcss'),
  sourcemaps = require('gulp-sourcemaps'),
  autoprefixer = require('autoprefixer'),
  cssnano = require('gulp-cssnano'),
  cfg = require('../package.json').config;

gulp.task('sass', function () {

  return gulp.src(cfg.src.sass + '/**/*.{scss,sass}')
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(postcss([autoprefixer()]))
    .pipe(cssnano())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(cfg.build.css));
});

gulp.task('sass:watch', function () {
  gulp.watch(cfg.src.sass + '/**/*.{scss,sass}', ['sass']);
});
