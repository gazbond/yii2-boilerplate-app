var gulp = require('gulp'),
    concat = require('gulp-concat'),

    tsc = require('gulp-typescript'),
    mocha = require('gulp-mocha'),
    jsMinify = require('gulp-uglify'),
    imagemin = require('gulp-imagemin'),

    scssLint = require('gulp-scss-lint'),
    sass = require('gulp-sass'),
    cssPrefixer = require('gulp-autoprefixer'),
    cssMinify = require('gulp-cssnano'),

    del = require('del'),
    merge = require('merge-stream'),
    SystemBuilder = require('systemjs-builder');

gulp.task('clean', () => {
    return del(['build', '../web/dist'], {force: true});
});

gulp.task('shims', () => {
    return gulp.src([
        'node_modules/core-js/client/shim.js',
        'node_modules/zone.js/dist/zone.js',
        'node_modules/reflect-metadata/Reflect.js'
    ])
        .pipe(concat('shims.js'))
        .pipe(gulp.dest('../web/dist/'));
});

gulp.task('lib', () => {
    return gulp.src([
        'node_modules/jquery/dist/jquery.js',
        'node_modules/bootstrap-sass/assets/javascripts/bootstrap.js'
    ])
        .pipe(concat('lib.js'))
        .pipe(gulp.dest('../web/dist/'));
});

gulp.task('tsc', () => {
    var tsProject = tsc.createProject('tsconfig.json');
    var tsResult = gulp.src('app/**/*.ts').pipe(tsProject());
    return tsResult.js.pipe(gulp.dest('build'));
});

gulp.task('build', ['tsc'], () => {
    var builder = new SystemBuilder();
    return builder.loadConfig('system.config.js')
        .then(() => builder.buildStatic('app', '../web/dist/bundle.js', {
            production: false,
            rollup: false
        }));
});

gulp.task('html', () => {
    return gulp.src('app/**/**.html')
        .pipe(gulp.dest('../web/dist/'));
});

gulp.task('images', () => {
    return gulp.src('images/**/*.*')
        .pipe(imagemin())
        .pipe(gulp.dest('../web/dist/images/'));
});

gulp.task('scss-lint', function () {
    return gulp.src('scss/**/*.scss')
        .pipe(scssLint({config: 'lint.yml'}));
});

gulp.task('scss', () => {
    return gulp.src('scss/main.scss')
        .pipe(sass())
        .pipe(concat('styles.css'))
        .pipe(cssPrefixer())
        .pipe(gulp.dest('../web/dist/'));
});

gulp.task('minify', () => {
    var js = gulp.src('../web/dist/*.js')
        .pipe(jsMinify())
        .pipe(gulp.dest('../web/dist/'));
    var css = gulp.src('../web/dist/*.css')
        .pipe(cssMinify())
        .pipe(gulp.dest('../web/dist/'));
    return merge(js, css);
});

gulp.task('test', () => {
    return gulp.src('test/**/*.spec.js')
        .pipe(mocha());
});

gulp.task('watch', () => {
    var watchTs = gulp.watch('app/**/**.ts', ['build']),
        watchScss = gulp.watch('scss/**/*.scss', ['scss-lint', 'scss']),
        watchHtml = gulp.watch('app/**/*.html', ['html']),
        watchImages = gulp.watch('images/**/*.*', ['images']),
        onChanged = function (event) {
            console.log('File ' + event.path + ' was ' + event.type + '. Running tasks...');
        };
    watchTs.on('change', onChanged);
    watchScss.on('change', onChanged);
    watchHtml.on('change', onChanged);
    watchImages.on('change', onChanged);
});

gulp.task('default', [
    'clean',
    'lib',
    'shims',
    'build',
    'html',
    'images',
    'scss-lint',
    'scss'
]);

