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
        .pipe(gulp.dest('./assets/build'));

});

gulp.task('script', () => {

    return gulp.src(['./assets/js/jquery.js', './assets/js/bootstrap.min.js'])
        .pipe(concat('app.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./assets/build'));

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
        .pipe(gulp.dest('./'));

});

gulp.task('default', ['css', 'script', 'html']);