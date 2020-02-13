// Requires
const gulp = require('gulp'),
	concat = require('gulp-concat'),
	gutil = require('gulp-util'),
	sourcemaps = require('gulp-sourcemaps'),
	source = require('vinyl-source-stream'),
	buffer = require('vinyl-buffer'),
	gulpif = require('gulp-if'),
	uglify = require('gulp-uglify'),
	browserify = require('browserify'),
	babel = require('babelify'),
	gulpbabel = require('gulp-babel'),
	cssnano = require('gulp-cssnano'),
	stylus = require('gulp-stylus'),
	jeet = require('jeet'),
	rupture = require('rupture'),
	axis = require('axis'),
	nib = require('nib'),
	imagemin = require('gulp-imagemin'),
	newer = require('gulp-newer');

// =====================================================================================================================
// Pastas de build e sources

const build = './public/build/',
	sources = {
		js: {
			files: ['./assets/js/app.js'],
			singles: ['./assets/js/single/*.js'],
			all: ['./assets/js/**/*.js'],
		},
		css: {
			files: ['./assets/css/app.styl'],
			singles: ['./assets/css/single/*.styl'],
			all: ['./assets/css/**/*.styl'],
		},
		images: ['./assets/images/**/*.*'],
	};
// =====================================================================================================================
// Ambiente de desenvolvimento

function getEnv() {
	// Verifica se é está indicado com o flag --prod para gerar arquivos minificados e sem os .maps (produção)
	return process.argv.includes('--prod');
}
const isProd = getEnv();

// Função de erro de exibição, para formatar e fazer erros personalizados mais uniforme
// pode ser combinado com cores do Gulp-util ou NPM para uma saída mais agradável
const onError = function (error) {
	// Construção inicial do erro e remove new line
	let errorString = `[${error.plugin}] ${error.message.replace("\n", '')}`;

	// Se o erro contém o nome do arquivo ou número da linha, adiciona na string
	if (error.fileName) {
		errorString += ` in ${error.fileName}`;
	}

	if (error.lineNumber) {
		errorString += ` on line ${error.lineNumber}`;
	}

	// A saída será de um erro como o seguinte:
	// [gulp-stylus] error message in file_name on line 1
	gutil.log(errorString);
};

// =====================================================================================================================
// Definição das Tasks

// Javascript
function _javascript(input, singles, output) {
	const bundler = browserify(input, { debug: true })
		.transform(babel.configure({
			presets: [
				["env", {
					"targets": {
						"browsers": ["last 7 versions"]
					}
				}]
			]
		}));

	function rebundle() {
		gulp.src(singles)
			.pipe(sourcemaps.init({ loadMaps: true }).on('error', onError))
			.pipe(gulpbabel({
				"presets": [
					["env", {
						"targets": {
							"browsers": ["last 7 versions"]
						}
					}]
				]
			}).on('error', onError))
			.pipe(gulpif(isProd, uglify().on('error', onError)))
			.pipe(sourcemaps.write('./').on('error', onError))
			.pipe(gulp.dest(output + 'js').on('error', onError));

		return bundler.bundle()
			.on('error', onError)
			.pipe(source('app.js').on('error', onError))
			.pipe(buffer().on('error', onError))
			.pipe(sourcemaps.init({ loadMaps: true }).on('error', onError))
			.pipe(gulpif(isProd, uglify().on('error', onError)))
			.pipe(sourcemaps.write('./').on('error', onError))
			.pipe(gulp.dest(output + 'js').on('error', onError));
	}

	return rebundle();
}

// Stylus
function _css(files, singles, output) {
	gulp.src(files)
		.pipe(sourcemaps.init({ loadMaps: true }).on('error', onError))
		.pipe(stylus({
			compress: isProd,
			use: [jeet(), rupture(), nib(), axis()]
		}).on('error', onError))
		.pipe(gulpif(isProd, cssnano().on('error', onError)))
		.pipe(sourcemaps.write('./').on('error', onError))
		.pipe(gulp.dest(output + 'css').on('error', onError));

	return gulp.src(singles)
		.pipe(sourcemaps.init({ loadMaps: true }).on('error', onError))
		.pipe(stylus({
			compress: isProd,
			use: [jeet(), rupture(), nib(), axis()]
		}).on('error', onError))
		.pipe(gulpif(isProd, cssnano().on('error', onError)))
		.pipe(sourcemaps.write('./').on('error', onError))
		.pipe(gulp.dest(output + 'css').on('error', onError));
}

// Imagens
function _images(input, output) {
	return gulp.src(input)
		.pipe(newer(output + 'images'))
		.pipe(imagemin().on('error', onError))
		.pipe(gulp.dest(output + 'images/'));
}

function _watch() {
	gulp.watch(sources.js.all, ['js']).on('change', event => {
		gutil.log(`[${event.path}] ${event.type.toUpperCase()}`);
	});

	gulp.watch(sources.css.all, ['css']).on('change', event => {
		gutil.log(`[${event.path}] ${event.type.toUpperCase()}`);
	});

	gulp.watch(sources.images, ['images']).on('change', event => {
		gutil.log(`[${event.path}] ${event.type.toUpperCase()}`);
	});
}

// Javascript
gulp.task('js', () => {
	_javascript(sources.js.files, sources.js.singles, build);
});

// CSS
gulp.task('css', () => {
	_css(sources.css.files, sources.css.singles, build);
});

// Images
gulp.task('images', () => {
	_images(sources.images, build);
});

// Watch
gulp.task('watch', () => {
	_watch();
});

gulp.task('default', ['js', 'css', 'images'], () => _watch());
