var gulp = require('gulp'),
    sass = require('gulp-ruby-sass'),
    prefix = require('gulp-autoprefixer'),
    exec = require('gulp-exec'),
    clean = require('gulp-clean'),
    livereload = require('gulp-livereload'),
    concat = require('gulp-concat'),
    notify = require('gulp-notify'),
    csscomb = require('gulp-csscomb'),
	compress = require('gulp-yuicompressor' ),
    jsFiles = [
        './assets/js/main/shared_vars.js',
        './assets/js/main/wrapper_start.js',
        './assets/js/modules/*.js',
        './assets/js/main/main.js',
        './assets/js/main/unsorted.js',
        './assets/js/main/wrapper_end.js',
        './assets/js/vendor/*.js',
        './assets/js/main/functions.js'
    ];


var options = {
    silent: true,
    continueOnError: true // default: false
};

// styles related
gulp.task('styles-dev', function () {
    return gulp.src('assets/scss/**/*.scss')
        .pipe(sass({sourcemap: true, style: 'compact'}))
        .on('error', function (e) {
            console.log(e.message);
        })
        .pipe(prefix("last 1 version", "> 1%", "ie 8", "ie 7"))
        .pipe(gulp.dest('./assets/css/'))
        .pipe(livereload())
        .pipe(notify('Styles task complete'));
});

gulp.task('styles', function () {
    return gulp.src('assets/scss/**/*.scss')
        .pipe(sass({sourcemap: true, style: 'nested'}))
        .on('error', function (e) {
            console.log(e.message);
        })
        .pipe(prefix("last 1 version", "> 1%", "ie 8", "ie 7"))
        .pipe(gulp.dest('./assets/css/'))
        .pipe(notify('Styles task complete'));
});

gulp.task('styles-prod', function () {
    return gulp.src('assets/scss/**/*.scss')
        .pipe(sass({sourcemap: false, style: 'nested'}))
        .on('error', function (e) {
            console.log(e.message);
        })
        .pipe(prefix("last 1 version", "> 1%", "ie 8", "ie 7"))
        .pipe(csscomb())
        .pipe(gulp.dest('./assets/css/'));
});

gulp.task('styles-compressed', function () {
	return gulp.src('assets/scss/**/*.scss')
		.pipe(sass({sourcemap: false, style: 'compressed'}))
		.on('error', function (e) {
			console.log(e.message);
		})
		.pipe(prefix("last 1 version", "> 1%", "ie 8", "ie 7"))
		.pipe(gulp.dest('./assets/css/'));
});

gulp.task('styles-watch', function () {
    return gulp.watch('assets/scss/**/*.scss', ['styles-dev']);
});


// javascript stuff
gulp.task('scripts', function () {
    return gulp.src(jsFiles)
        .pipe(concat('main.js'))
        .pipe(gulp.dest('./assets/js/'));
});

// javascript stuff
gulp.task('scripts-compressed', function () {
	gulp.src(jsFiles)
		.pipe(concat('main.js'))
		.pipe(gulp.dest('./assets/js/'));

	return gulp.src('./assets/js/main.js')
		.pipe(compress({
			type: 'js'
		}))
		.pipe(gulp.dest('./assets/js/'));
});

gulp.task('scripts-watch', function () {
    return gulp.watch('assets/js/**/*.js', ['scripts']);
});

gulp.task('watch', function () {
    gulp.watch('assets/scss/**/*.scss', ['styles-dev']);
    gulp.watch('assets/js/**/*.js', ['scripts']);
});

// usually there is a default task  for lazy people who just wanna type gulp
gulp.task('start', ['styles', 'scripts'], function () {
    // silence
});

gulp.task('server', ['styles-compressed', 'scripts-compressed'], function () {
    console.log('The styles and scripts have been compiled for production! Go and clear the caches!');
});


/**
 * Copy theme folder outside in a build folder, recreate styles before that
 */
gulp.task('copy-folder', ['styles-prod', 'scripts'], function () {

    return gulp.src('./')
        .pipe(exec('rm -Rf ./../build; mkdir -p ./../build/pile; rsync -av --exclude="node_modules" ./* ./../build/pile/', options));
});

/**
 * Clean the folder of unneeded files and folders
 */
gulp.task('build', ['copy-folder'], function () {

    // files that should not be present in build
    files_to_remove = [
        '**/codekit-config.json',
        'node_modules',
        'config.rb',
        'gulpfile.js',
        'package.json',
        'pxg.json',
        'build',
        'css',
        '.idea',
        '**/.svn*',
        '**/*.css.map',
        '**/.sass*',
        '.sass*',
        '**/.git*',
        '*.sublime-project',
        '.DS_Store',
        '**/.DS_Store',
        '__MACOSX',
        '**/__MACOSX',
        'README.md',
        '.csscomb'
    ];

    files_to_remove.forEach(function (e, k) {
        files_to_remove[k] = '../build/pile/' + e;
    });

    return gulp.src(files_to_remove, {read: false})
        .pipe(clean({force: true}));
});

/**
 * Create a zip archive out of the cleaned folder and delete the folder
 */
gulp.task('zip', ['build'], function(){

    return gulp.src('./')
        .pipe(exec('cd ./../; rm -rf pile.zip; cd ./build/; zip -r -X ./../pile.zip ./pile; cd ./../; rm -rf build'));

});

// usually there is a default task  for lazy people who just wanna type gulp
gulp.task('default', ['start'], function () {
    // silence
});

/**
 * Short commands help
 */

gulp.task('help', function () {

    var $help = '\nCommands available : \n \n' +
        '=== General Commands === \n' +
        'start              (default)Compiles all styles and scripts and makes the theme ready to start \n' +
        'zip               	Generate the zip archive \n' +
        'build				Generate the build directory with the cleaned theme \n' +
        'help               Print all commands \n' +
        '=== Style === \n' +
        'styles             Compiles styles \n' +
        'styles-prod        Compiles styles in production mode \n' +
		'styles-compressed  Compiles styles in compressed mode \n' +
        'styles-dev         Compiles styles in development mode \n' +
        '=== Scripts === \n' +
        'scripts            Concatenate all js scripts \n' +
        'scripts-dev        Concatenate all js scripts and live-reload \n' +
        '=== Watchers === \n' +
        'watch              Watches all js and scss files \n' +
        'styles-watch       Watch only styles\n' +
        'scripts-watch      Watch scripts only \n';

    console.log($help);

});