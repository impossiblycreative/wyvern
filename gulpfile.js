const gulp = require('gulp');
const sourcemaps = require('gulp-sourcemaps');
const postcss = require('gulp-postcss');
const precss = require('precss');
const concat = require('gulp-concat');
const atImport = require('postcss-import');
const cssnano = require('cssnano');
const calc = require('postcss-calc');
const mixins = require('postcss-mixins');

gulp.task('css', function() {
  const processors = [
      atImport,
      mixins,
      precss,
      cssnano,
      calc
  ]

  return gulp
    .src('css/src/**/*.css')
        .pipe(sourcemaps.init())
            .pipe(postcss(processors))
            .pipe(concat('main.min.css'))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('css/build'));
});


gulp.task('watch', function() {
    gulp.watch('css/src/**/*.css', gulp.series('css'));
});