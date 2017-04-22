var gulp = require('gulp');
var stylus = require('gulp-stylus');
var concat = require('gulp-concat');

var js = [
	'./node_modules/angular/angular.min.js',
	'./Site/app/www/src/js/main.js'
]

gulp.task('stylus', function() {
	gulp.src('./Site/app/www/src/stylus/style.styl')
			.pipe(stylus({
				compress: true
			}))
			.pipe(gulp.dest('./Site/app/www/out/css/'))
})

gulp.task('concat', function() {
	gulp.src(js)
			.pipe(concat('script.min.js'))
			.pipe(gulp.dest('./Site/app/www/out/js/'))
});

gulp.task('watch', function() {
	gulp.watch(['./Site/app/www/src/stylus/**/*.styl'], ['stylus'])
	gulp.watch(['./Site/app/www/src/js/*.js'], ['concat'])
});