const gulp = require('gulp');
const concat = require('gulp-concat');
const terser = require('gulp-terser');
const sourcemaps = require('gulp-sourcemaps');
const {src, dest} = require('gulp');
const minify = require('gulp-minify');
const minifyCss = require('gulp-minify-css');
const {watch} = require('gulp');
const concatCss = require('gulp-concat-css');
const sass = require('gulp-sass')(require('sass'));

/**
 * Theme Path
 */
const themePath = './local_packages/football/';

/**
 * all Js Files
 *
 * the order of explicit added filenames is important
 * if you also use a *-selector the file will not be included twice
 *
 * @type {string[]}
 */
const jsPath = [
    themePath + 'Resources/Private/JavaScript/Src/*.js', //add custom scripts
];

function jsTask() {
    return src(jsPath)
        .pipe(sourcemaps.init())
        .pipe(concat('index.js'))
        .pipe(terser())
        .pipe(sourcemaps.write('.'))
        .pipe(minify({
            ext: {
                min: '.min.js'
            },
            ignoreFiles: ['-min.js']
        }))
        .pipe(dest(themePath + 'Resources/Public/JavaScript/'));
}

exports.jsTask = jsTask;

/**
 * SCSS compiler
 *
 * @type {string[]}
 */
const scssSrcFile = themePath + 'Resources/Private/Scss/index.scss';

function scssTask() {
    return src(scssSrcFile)
        .pipe(sass({
            includePaths: ['./node_modules/']
        }))
        .pipe(sourcemaps.init())
        .pipe(concatCss('index.css'))
        .pipe(minifyCss())
        .pipe(sourcemaps.write('.'))
        .pipe(dest(themePath + 'Resources/Public/Css/'))
}

exports.scssTask = scssTask;

/**
 * Assets Watcher
 */
exports.watch = function () {
    watch(themePath + 'Resources/Private/Scss/**/*.scss', scssTask);
    watch(themePath + 'Resources/Private/JavaScript/**/*.js', jsTask);
};
