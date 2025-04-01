const gulp = require('gulp');
const terser = require('gulp-terser');
const sourcemaps = require('gulp-sourcemaps');
const minify = require('gulp-minify');
const sass = require('gulp-sass')(require('sass'));
const esbuild = require('gulp-esbuild');

/**
 * JavaScript Paths
 */
const jsPath = [
    `./Resources/Private/JavaScript/Src/*.js`, // Add custom scripts
];

function jsTask() {
    return gulp.src(jsPath)
        .pipe(sourcemaps.init())
        .pipe(esbuild({
            outfile: 'index.js',
            bundle: true,
        }))
        .pipe(terser())
        .pipe(sourcemaps.write('.'))
        .pipe(minify({
            ext: { min: '.min.js' },
            ignoreFiles: ['-min.js'],
        }))
        .pipe(gulp.dest(`./Resources/Public/JavaScript/`));
}

exports.jsTask = jsTask;

/**
 * SCSS Compiler
 */
const scssSrcFile = `./Resources/Private/Scss/index.scss`;

function scssTask() {
    return gulp.src(scssSrcFile)
        .pipe(sass({
            silenceDeprecations: [
                'import',
                'global-builtin',
                'mixed-decls',
                'color-functions',
            ]
        }).on('error', sass.logError))
        .pipe(gulp.dest(`./Resources/Public/Css/`));
}

exports.scssTask = scssTask;

/**
 * Watcher Task
 */
function watchTask() {
    gulp.watch(`./Resources/Private/Scss/**/*.scss`, scssTask);
    gulp.watch(`./Resources/Private/JavaScript/**/*.js`, jsTask);
}

exports.watch = watchTask;

// Default Task
exports.default = gulp.series(gulp.parallel(jsTask, scssTask), watchTask);
