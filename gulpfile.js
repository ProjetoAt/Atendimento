var gulp = require('gulp');
var stylus = require('gulp-stylus');

gulp.task('stylus', function() {
	gulp.src('./Site/app/www/src/stylus/style.styl')
			.pipe(stylus())
			.pipe(gulp.dest('./Site/app/www/out/css/'))
})

gulp.task('watch', function() {
	gulp.watch(['./Site/app/www/src/stylus/**/*.styl'], ['stylus']);
});