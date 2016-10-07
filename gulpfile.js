var gulp = require('gulp');
var gutil = require('gulp-util');
var less = require('gulp-less');
var path = require('path');
var connect = require('gulp-connect');

var LessAutoprefix = require('less-plugin-autoprefix');
var autoprefix = new LessAutoprefix({browsers: ['> 0%','last 12 versions', 'Firefox > 20', 'Android > 2.2']});

gulp.task('less', function () {
  var l = less({
    plugins: [autoprefix]
  });
  l.on('error',function(e){
    gutil.log(e);
    l.end();
  });
  return gulp.src('./less/*.less')
    .pipe(l)
    .pipe(gulp.dest('./css/'))
    .pipe(connect.reload());
});
gulp.task('connect', function() {
  connect.server({
    root: './',
    livereload: true
  });
});
gulp.task('html', function() {
  return gulp.src('./*.html')
    .pipe(connect.reload());
})
gulp.task('watch', function() {
  gulp.watch('./less/*.less', ['less']);
  gulp.watch('./*.html', ['html']);
});
gulp.task('default', ['less', 'connect', 'watch']);
