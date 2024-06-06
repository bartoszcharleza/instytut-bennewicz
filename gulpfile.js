const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const concat = require('gulp-concat');
const csso = require('gulp-csso');
const autoprefixer = require('gulp-autoprefixer');
const babel = require('gulp-babel');
const uglify = require('gulp-uglify');
const include = require('gulp-include');
const browserSync = require('browser-sync').create();
const fs = require('fs');

let dirs = {
    css: 'src/css/**/*.scss',
    js: 'src/js/*.js',
    jslib: 'src/js/lib/_libraries.js',
    build: 'dist/',
    buildcss: 'dist/build-style.css',
    buildjs: 'dist/build-js.js',
    buildjslibs: 'dist/build-libs.js'
};

gulp.task('css', function () {
    return gulp.src('src/css/*.scss')
        .pipe(concat('build-style.css'))
        .pipe(sass().on('error', sass.logError))
        .pipe(csso({
            sourceMap: false,
            debug: false
        }))
        .pipe(autoprefixer({
            overrideBrowserslist: ['last 2 versions'],
            cascade: false
        }))
        .pipe(gulp.dest(dirs.build))
        .pipe(browserSync.stream());
});

gulp.task('js', function () {
    return gulp.src(dirs.js)
        .pipe(babel({
            presets: ['@babel/preset-env']
        }))
        .pipe(concat('build-js.js'))
        .pipe(uglify())
        .pipe(gulp.dest(dirs.build))
        .pipe(browserSync.stream());
});

gulp.task('jslibs', function () {
    return gulp.src(dirs.jslib)
        .pipe(concat('build-libs.js'))
        .pipe(include())
        .pipe(uglify())
        .pipe(gulp.dest(dirs.build))
        .pipe(browserSync.stream());
});

gulp.task('combine-jsbuild', function () {
    if (fs.existsSync(dirs.buildjs) && fs.existsSync(dirs.buildjslibs)) {
        return gulp.src(['dist/build-libs.js', 'dist/build-js.js'])
            .pipe(concat('build-combined.js'))
            .pipe(gulp.dest(dirs.build))
            .pipe(browserSync.stream());
    } else {
        console.log('Building app');
    }
});

gulp.task('build',
    gulp.series('css', 'js', 'jslibs', 'combine-jsbuild')
);

gulp.task('watch', function () {
    browserSync.init({
        proxy: "http://bennewicz.local/", // Adjust this to your local development URL
        notify: false
    });

    gulp.watch(['*.php', '**/*.php']).on('change', browserSync.reload);
    gulp.watch(dirs.css, gulp.series('css'));
    gulp.watch(dirs.js, gulp.series('js'));
    gulp.watch(dirs.jslib, gulp.series('jslibs'));
    gulp.watch([dirs.js, dirs.jslib], gulp.series('combine-jsbuild'));
});

gulp.task('default', gulp.series('build', 'watch'));
