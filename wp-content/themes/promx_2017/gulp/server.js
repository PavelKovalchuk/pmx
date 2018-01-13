var gulp        = require('gulp'),
browserSync = require('browser-sync').create(),
cfg = require('../package.json').config;

gulp.task('server', function() {
    browserSync.init({
        server: {
            baseDir: "./src"
        },
        files: ['./src/**/*.*', cfg.build.css]
    });
});