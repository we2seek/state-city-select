'use strict;'

var gulp        = require('gulp');
var browserSync = require('browser-sync').create();
var sass        = require('gulp-sass');

var path = {
    sass: ['app/css/**/*.scss', 'app/css/**/*.sass'],
    js: ['app/js/**/*.js'],
    html: ['app/**/*.html']
};

// Compile sass into CSS & auto-inject into browsers
gulp.task('sass', function(){
    return gulp.src(path.sass)
    .pipe(sass())
    .pipe(gulp.dest("app/css"))
    .pipe(browserSync.stream());
});

// Static Server + watching scss/html files
gulp.task('serve', ['sass'], function() {

    browserSync.init({
        server: "./app"
    });

    gulp.watch(path.sass, ['sass']);
    gulp.watch(path.js).on('change', browserSync.reload);
    gulp.watch(path.html).on('change', browserSync.reload);
});


// The default task (called when you run `gulp` from cli)
gulp.task('default', ['serve']);