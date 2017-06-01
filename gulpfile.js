var gulp = require('gulp');
var stylus = require('gulp-stylus');
var concat = require('gulp-concat');
var dest = require('gulp-dest');

var js = [
	'./bower_components/jquery/dist/jquery.js',
	'./bower_components/bootstrap/dist/js/bootstrap.js'
]

// COncatena todos arquivos base e Javascript em um só
gulp.task('baseJs', function() {
	gulp.src(js)
		.pipe(concat('base.min.js'))
		.pipe(gulp.dest('./Site/app/www/src/js/'))
})

// Move arquivos javascript da pasta src para a pasta out
gulp.task('javascript', function() {
	gulp.src('./Site/app/www/src/js/*.js')
		.pipe(gulp.dest('./Site/app/www/out/js/'))
})

// Compila todos stylus da raiz da pasta
gulp.task('stylus', function() {
	gulp.src('./Site/app/www/src/stylus/*.styl')
		.pipe(stylus({
			compress: true
		}))
		.pipe(gulp.dest('./Site/app/www/out/css/'))
})

// Encaminha arquivos externos para suas pastas no projeto
gulp.task('dest', function() {
	// Normalize
	gulp.src('./bower_components/normalize-css/normalize.css')
		.pipe(dest({ext: '.styl'}))
		.pipe(gulp.dest('./Site/app/www/src/stylus/base/'))

	// Font-awesome
	gulp.src('./bower_components/font-awesome/css/font-awesome.css')
		.pipe(dest({ext: '.styl'}))
		.pipe(gulp.dest('./Site/app/www/src/stylus/base/'))

	// Bootstrap
	gulp.src('./bower_components/bootstrap/dist/css/bootstrap.css')
		.pipe(dest({ext: '.styl'}))
		.pipe(gulp.dest('./Site/app/www/src/stylus/base/'))

})

gulp.task('build', ['dest', 'stylus', 'baseJs', 'javascript']);

gulp.task('watch', function() {
	gulp.watch(['./Site/app/www/src/stylus/**/*.styl', './Site/app/www/src/stylus/*.styl'], ['stylus'])
	gulp.watch(['./Site/app/www/src/js/*.js'], ['javascript'])
});