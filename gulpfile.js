'use strict';

const gulp = require('gulp');
const uglify = require('gulp-uglify');
const concat = require('gulp-concat');
const concatCSS = require('gulp-concat-css');
const cleanCSS = require('gulp-clean-css');
const htmlmin = require('gulp-htmlmin');
const rename = require('gulp-rename');

gulp.task('css', () => {

    return gulp.src('./assets/css/*css')
        .pipe(concatCSS('style.css'))
        .pipe(cleanCSS({compatibility: 'ie8'}))
        .pipe(gulp.dest('./docs/assets/css'));

});

gulp.task('script', () => {

    return gulp.src(['./assets/js/jquery.js', './assets/js/bootstrap.min.js'])
        .pipe(concat('app.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./docs/assets/js'));

});

gulp.task('html', () => {

    return gulp.src('./index_dev.html')
        .pipe(htmlmin({
            collapseWhitespace: true,
            minifyJS: true,
            removeComments: true,
            removeEmptyAttributes: true,
            removeOptionalTags: true,
            removeStyleLinkTypeAttributes: true,
            useShortDoctype: true
        }))
        .pipe(rename('index.html'))
        .pipe(gulp.dest('./docs'));

});

gulp.task('copy_img', function() {

  gulp.src('./assets/img/*')
    .pipe(gulp.dest('./docs/assets/img'))

})

gulp.task('copy_fonts', function() {

  gulp.src('./assets/fonts/*')
    .pipe(gulp.dest('./docs/assets/fonts'))

})

gulp.task('copy_font', function() {

  gulp.src('./assets/font/*')
    .pipe(gulp.dest('./docs/assets/font'))

})

gulp.task('dev', ['css', 'script', 'html', 'copy_img', 'copy_fonts', 'copy_font'], function() {

  gulp.watch('./index_dev.html', ['html'])
  gulp.watch('./assets/css/main.css', ['css'])

})

gulp.task('build', ['css', 'script', 'html', 'copy_img', 'copy_fonts', 'copy_font']);