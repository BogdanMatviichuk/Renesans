'use strict';

const gulp = require('gulp');
const babel = require('gulp-babel');
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const cleancss = require('gulp-clean-css');
const concat = require('gulp-concat');
const rename = require('gulp-rename');
const uglify = require('gulp-uglify');
const scsslint = require('gulp-scss-lint');
const sourcemaps = require('gulp-sourcemaps');
const browserSync = require('browser-sync').create();

/**
 * Here we set a prefix for our compiled and stylesheet and scripts.
 * Note that this should be the same as the `$themeHandlePrefix` in `func-script.php` and `func-style.php`.
 */
const themePrefix = 'renaissancelondon';

/**
 * Paths and files
 */
const srcHtml = './*.html';
const srcScss = 'scss/**/*.scss';
const srcJsDir = 'js';
const srcJsFiles = [
    //`./node_modules/babel-polyfill/dist/polyfill.js`,
    // `libs/custom-cursor/dist/main.js`,
    `libs/imagesloaded/imagesloaded.pkgd.min.js`,
    // `${srcJsDir}/scripts/swipe.js`,
    `${srcJsDir}/scripts/custom-cursor.js`,
    `${srcJsDir}/scripts/home-page.js`,
    `${srcJsDir}/scripts/product-page.js`,
    `${srcJsDir}/scripts/restoration-page.js`,
    `${srcJsDir}/scripts/press-page.js`,
    `${srcJsDir}/scripts/common.js`,

];
const destCss = 'css';
const destJs = 'js';

/**
 * Scss lint
 */
gulp.task('scss-lint', () => {
    return gulp.src(srcScss)
        .pipe(scsslint());
});

/**
 * Task for styles.
 *
 * Scss files are compiled and sent over to `assets/css/`.
 */
gulp.task('css', async () => {
    return gulp.src(srcScss)
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer({ cascade : false }))
        .pipe(sourcemaps.init({loadMaps: true}))
        .pipe(rename(`${themePrefix}.min.css`))
        .pipe(cleancss())
        .pipe(sourcemaps.write('.'))
        .pipe(browserSync.reload({stream: true}))
        .pipe(gulp.dest(destCss));
});

/**
 * Task for scripts.
 *
 * Js files are uglified and sent over to `assets/js/scripts/`.
 */
gulp.task('js', () => {
    return gulp.src(srcJsFiles)
        .pipe(babel({
            presets : ['es2015']
        }))
        .pipe(concat(`${themePrefix}.min.js`))
        // .pipe(uglify())
        .pipe(browserSync.reload({stream: true}))
        .pipe(gulp.dest(destJs));
});

gulp.task('html', () => {
    return gulp.src('./*.html')
        .pipe(browserSync.reload({stream: true}))
});

/**
 * Task for watching styles and scripts.
 */
gulp.task('watch', () => {
    browserSync.init({
        server: {
            baseDir: "./",
        },
        // proxy: "aj.dev",
        notify: false
    });

    gulp.watch(srcScss, gulp.series('css')).on('change', browserSync.reload);
    gulp.watch(srcJsFiles, gulp.series('js')).on('change', browserSync.reload);
    gulp.watch("./*.html").on('change', browserSync.reload);
});

/**
 * Default task
 */
gulp.task('default', gulp.series('css', 'js') );
