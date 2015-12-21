var gulp = require('gulp');
var runSequence = require('run-sequence');
var less = require('gulp-less');
var sourcemaps = require('gulp-sourcemaps');
var concatCss = require('gulp-concat-css');
var minifyCss = require('gulp-minify-css');
var del = require('del');
var rimraf = require('gulp-rimraf');
var rev = require('gulp-rev');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var livereload = require('gulp-livereload');

var appless = 'app.less';
var adminless = 'administrator.less';
var p_public = './public';
var p_resource = './resources/assets';
var p_bower = './resources/bower_components';
var p_php = './resources/views/**/*.php';
var p_less = p_resource + '/less';
var p_css = p_public + '/css';
var p_js = p_resource + '/js';
var p_pjs = p_public + '/js';
var p_build = p_public + '/build';
var p_temp = p_public + '/temp';

var bower_files = [
    p_bower + '/jquery/dist/jquery.js',
    p_bower + '/bootstrap/dist/js/bootstrap.js',
    p_bower + '/headhesive/dist/headhesive.js',
    p_bower + '/lightbox2/dist/js/lightbox.js',
    p_bower + '/bootbox.js/bootbox.js',
    p_bower + '/lodash/lodash.js',
    p_bower + '/autosize/dist/autosize.js',
    p_bower + '/microplugin/src/microplugin.js',
    p_bower + '/sifter/sifter.js',
    p_bower + '/selectize/dist/js/selectize.js',
    p_bower + '/marked/lib/marked.js'
];

/** Stylesheet **/
gulp.task('less', function () {
    return gulp.src([p_less + '/' + appless, p_less + '/' + adminless])
        .pipe(less())
        .pipe(gulp.dest(p_css));
});

gulp.task('concatcss', function() {
    return gulp.src([p_css + '/prism.css', p_css + '/animate.css', p_css +'/app.css'])
        .pipe(sourcemaps.init())
        .pipe(concatCss('dontpushpush.css'))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(p_temp));
});

gulp.task('concatadmincss', function() {
    return gulp.src([p_css + '/prism.css', p_css + '/animate.css', p_css + '/lightbox.css', p_css +'/administrator.css'])
        .pipe(sourcemaps.init())
        .pipe(concatCss('administrator.css'))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(p_temp));
});

gulp.task('minifiedcss', function() {
    return gulp.src([p_temp + '/dontpushpush.css', p_temp + '/administrator.css'])
        .pipe(minifyCss({keepSpecialComments: 0}))
        .pipe(gulp.dest(p_temp));
});

gulp.task('copycsstobuild', function() {
    return gulp.src([p_temp + '/dontpushpush.css', p_temp + '/administrator.css'])
        .pipe(gulp.dest(p_build));
});

gulp.task('cleanupcss', function() {
    del([p_css + '/app.css', p_css + '/administrator.css', p_temp]);
});

gulp.task('cssdev', function(callback) {
    runSequence('less', ['concatcss', 'concatadmincss'], 'copycsstobuild', 'cleanupcss', callback);
});

gulp.task('css', function(callback) {
    runSequence('less', ['concatcss', 'concatadmincss'], 'minifiedcss', 'copycsstobuild', 'cleanupcss', callback);
});

/** Javascript **/
gulp.task('bowerjs', function() {
    return gulp.src(bower_files)
        .pipe(concat('bower.js'))
        .pipe(gulp.dest(p_resource + '/js'));
});

gulp.task('concatjs', function() {
    return gulp.src([p_resource + '/js/bower.js', p_resource + '/js/prism.js', p_resource + '/js/ie10-viewport-bug-workaround.js', p_resource + '/js/app.js'])
        .pipe(concat('dontpushpush.js'))
        .pipe(gulp.dest(p_temp));
});

gulp.task('minifiedjs', function()  {
   return gulp.src(p_temp + '/dontpushpush.js')
       .pipe(uglify())
       .pipe(gulp.dest(p_temp));
});

gulp.task('copyjstobuild', function() {
    return gulp.src(p_temp + '/dontpushpush.js')
        .pipe(gulp.dest(p_build));
});

gulp.task('cleanupjs', function() {
    del([p_temp, p_resource + '/js/bower.js']);
});

gulp.task('jsdev', function(callback) {
    runSequence('bowerjs', 'concatjs', 'copyjstobuild', 'cleanupjs', callback);
});

gulp.task('js', function(callback) {
    runSequence('bowerjs', 'concatjs', 'minifiedjs', 'copyjstobuild', 'cleanupjs', callback);
});


gulp.task('articlesjs', function() {
    return gulp.src(p_resource + '/js/article.js')
        .pipe(uglify())
        .pipe(gulp.dest(p_build));
});

/** versioning **/
gulp.task('deleteotherthan', function() {
    return gulp.src(['!'+p_build+'/article.js', '!'+p_build+'/dontpushpush.js', '!'+p_build+'/dontpushpush.css', '!'+p_build+'/administrator.css', p_build + '/*.*'])
        .pipe(rimraf());
});
gulp.task('versioning', ['deleteotherthan'], function() {
    return gulp.src([p_build + '/*.*'])
        .pipe(rev())
        .pipe(gulp.dest(p_build))
        .pipe(rev.manifest())
        .pipe(gulp.dest(p_build))
        .pipe(livereload());
});

/** clean the build directory **/
gulp.task('cleanbuild', function() {
    del([p_build]);
});

gulp.task('default', function(callback) {
    runSequence('cleanbuild', 'css', 'js', 'articlesjs', 'versioning', callback);
});

gulp.task('defaultdev', function(callback) {
    runSequence('cleanbuild', 'cssdev', 'jsdev', 'articlesjs', 'versioning', callback);
});

gulp.task('watchcss', function(callback) {
    runSequence('cssdev', 'articlesjs', 'versioning', callback);
});

gulp.task('watchjs', function(callback) {
    runSequence('jsdev', 'articlesjs', 'versioning', callback);
});

gulp.task('watchphp', function() {
    return gulp.src('readme.md')
        .pipe(livereload());
});

gulp.task('watch', function() {
    livereload.listen();
    gulp.watch(p_php, ['watchphp']);
    gulp.watch(p_less + '/*.less', ['watchcss']);
    gulp.watch(p_js + '/*.js', ['watchjs']);
});