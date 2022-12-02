'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass')(require('sass'));
var concat = require('gulp-concat');
var rtlcss  = require('gulp-rtlcss');
var rename = require('gulp-rename');
var minify = require('gulp-minify');

sass.compiler = require('sass');

gulp.task('sass', function() {
  return gulp.src('./assets/styles/scss/style.scss')
    .pipe(concat('style.scss'))
    .pipe(sass()).on('error', sass.logError)
    .pipe(minify())
    .pipe(gulp.dest('./assets/styles/'))
    .pipe(rtlcss())
    .pipe(rename({ basename: 'style-rtl' }))
    .pipe(gulp.dest('./assets/styles/'));
});
