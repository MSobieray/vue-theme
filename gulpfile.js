/*==============================================================================
Gulp
==============================================================================*/

var gulp = require( 'gulp' ),
	gulpLoadPlugins = require( 'gulp-load-plugins' ),
	p = gulpLoadPlugins(),
	dest = 'wp-content/themes/theme-name/';
function handleError( err ) {
	console.log( err.toString() );
	this.emit( 'end' );
}

/*==============================================================================
Clean
==============================================================================*/

gulp.task( 'clean', function() {
	gulp.src( [ dest + 'css', dest + 'js', dest + 'img', dest + 'fnt'], { 
			read: false
		})
		.pipe( p.rimraf() )
		.pipe( p.notify( 'Gulp Clean Task Complete' ) );
});

/*==============================================================================
Styles
==============================================================================*/

gulp.task( 'styles-wp', function() {
	return gulp.src( 'src/scss/wp-admin.scss' )
		.pipe( p.sass({outputStyle: 'compressed'}).on('error', p.sass.logError))
		.pipe( p.autoprefixer() )
		.pipe( gulp.dest( dest + 'css' ) );

	return gulp.src( 'src/scss/wp-login.scss' )
			.pipe( p.sass({outputStyle: 'compressed'}).on('error', p.sass.logError))
		.pipe( p.autoprefixer() )
		.pipe( gulp.dest( dest + 'css' ) );
});

gulp.task( 'styles', [ 'styles-wp' ], function() {
	return gulp.src( 'src/scss/imports.scss' )
		.pipe( p.sass({outputStyle: 'expanded'}).on('error', p.sass.logError))
		.pipe( p.rename( 'main.css' ) )
		.pipe( gulp.dest( dest + 'css' ) )
		.pipe( p.autoprefixer() )
		.pipe( p.cssnano( { advanced: false, zindex: false } ) )
		.pipe( p.rename( 'main.min.css' ) )
		.pipe( gulp.dest( dest + 'css' ) )
		.pipe( p.notify( 'Gulp Styles Task Completed' ) );
});


/*==============================================================================
Scripts
==============================================================================*/

gulp.task( 'scripts1', function() {
	return gulp.src( [ 'src/js/*.js', '!src/js/imports.js',] )
		.pipe( p.jshint() )
		.pipe( p.jshint.reporter( 'default') )
		.pipe( p.babel({
    	presets: ['es2015']
     }));
});

gulp.task( 'scripts2', [ 'scripts1' ], function() {
	return gulp.src( 'src/js/lib/imports.js' )
		.pipe( p.imports() )
		.pipe( p.uglify() )
		.pipe( p.rename( 'imports.lib.min.js' ) )
		.pipe( gulp.dest( 'temp' ) );
});

gulp.task( 'scripts3', [ 'scripts2' ], function() {
	return gulp.src( 'src/js/imports.js' )
		.pipe( p.imports() )
		.pipe( p.uglify() )
		.on( 'error', handleError )
		.pipe( p.rename( 'imports.min.js' ) )
		.pipe( gulp.dest( 'temp' ) );
});

gulp.task( 'scripts4', [ 'scripts3' ], function() {
	return gulp.src( [ 'temp/imports.lib.min.js', 'temp/imports.min.js' ] )
		.pipe( p.concat( 'main.min.js') )
		.pipe( gulp.dest( dest + 'js' ) );
});

gulp.task( 'scripts5', [ 'scripts4' ], function() {
	return gulp.src( 'temp', {
			read: false
		})
		.pipe( p.rimraf() );
});

gulp.task( 'scripts', [ 'scripts5' ], function() {
	return gulp.src( 'src/js/lib/modernizr.min.js' )
		.pipe( gulp.dest( dest + 'js' ) )
		.pipe( p.notify( 'Gulp Scripts Task Complete' ) );
});

/*==============================================================================
Images
==============================================================================*/

gulp.task( 'images', function() {
	gulp.src( 'src/img/**/*' )
		.pipe( p.changed( dest + 'img' ) )
		.pipe( p.imagemin( { optimizationLevel: 3, progressive: true, interlaced: true } ) )
		.pipe( gulp.dest( dest + 'img' ) )
		.pipe( p.notify( 'Gulp Images Task Completed' ) );
});

/*==============================================================================
SVG
==============================================================================*/

gulp.task( 'svg', function() {
	gulp.src('src/svg/**/*.svg' )
		.pipe(p.svgmin())
        .pipe(gulp.dest(dest + 'svg'))
		.pipe( p.notify( 'Gulp SVG Task Completed' ) );
});

/*==============================================================================
Fonts
==============================================================================*/

gulp.task( 'fonts', function() {
	gulp.src('src/fnt/**/*' )
		.pipe( gulp.dest( dest + 'fnt' ) )
		.pipe( p.notify( 'Gulp Fonts Task Completed' ) );
});

/*==============================================================================
Watch
==============================================================================*/

gulp.task('watch', function() {
	gulp.watch( 'src/scss/**/*', [ 'styles' ] );
	gulp.watch( 'src/js/**/*.js', [ 'scripts' ] );
	gulp.watch( 'src/img/**/*', [ 'images' ] );
	gulp.watch( 'src/svg/**/*.svg', [ 'svg' ] );
	gulp.watch( 'src/fnt/**/*', [ 'fonts' ] );
});

/*==============================================================================
Default
==============================================================================*/

gulp.task( 'default', [ 'styles', 'scripts', 'images', 'svg', 'fonts' ], function() {
	gulp.start( 'watch' );
});