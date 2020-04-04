const gulp = require('gulp');
const sourcemaps = require('gulp-sourcemaps');
const postcss = require('gulp-postcss');
const precss = require('precss');
const concat = require('gulp-concat');
const atImport = require('postcss-import');
const cssnano = require('cssnano');
const calc = require('postcss-calc');
const mixins = require('postcss-mixins');

gulp.task( 'css', function() {
  const processors = [
      atImport,
      mixins,
      precss,
      cssnano,
      calc
  ]

  return gulp
    .src( ['css/src/**/*.css', '!css/src/editor.css'] )
        .pipe( sourcemaps.init() )
            .pipe( postcss( processors ) )
            .pipe( concat( 'main.css' ) )
        .pipe( sourcemaps.write() )
        .pipe( gulp.dest( 'css/build' ) );
});

gulp.task( 'css-editor', function() {
    const processors = [
        atImport,
        mixins,
        precss,
        cssnano,
        calc
    ]
  
    return gulp
      .src('css/src/editor.css')
        .pipe(postcss(processors))
        .pipe(concat('editor.css'))
        .pipe(gulp.dest('css/build'));
});

gulp.task('watch', function() {
    gulp.watch('css/src/**/*.css', gulp.series('css-editor'));
    gulp.watch('css/src/**/*.css', gulp.series('css'));
});