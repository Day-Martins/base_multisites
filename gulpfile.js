// MODULES
const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const plumber = require('gulp-plumber');
const sourcemaps = require('gulp-sourcemaps');
const concat = require('gulp-concat');

const sheets = require('./sheets');

// COMPILE AND MINIFY SASS
gulp.task('sass', function (done) {
    sheets.map(function (file) {
        return gulp.src(
            [
                file.scss_src
            ]
        )
            .pipe(plumber())
            .pipe(concat(file.css_name + '.min.css'))
            .pipe(sass({
                sourceComments: 'map',
                sourceMap: 'sass',
                outputStyle: 'compressed'   // nested/expanded/compact/compressed(minified).
            }).on('error', function (e) {
                console.log(e);
            }))
            .pipe(sourcemaps.write())
            .pipe(gulp.dest(file.css_dest));
    });
    done();
});

// Watch files
function watchFiles() {
    gulp.watch([
      './web/themes/custom/bagov_base/assets/scss/**/*',
      './web/modules/custom/bagov_base_blocks/assets/scss/**/*'
    ],
    gulp.parallel('sass')
    );
}


exports.watch = watchFiles;
exports.default = watchFiles;
