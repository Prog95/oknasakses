'use strict';

let domain = 'roses.ap';
let fileswatch = '+(twig|php|tpl)'; // File monitoring, extensions

var path = {
	build: {
		js: './',
		html: './',
		img: '../../uploads/',
		css: './',
		fonts: './fonts/'
	},
	src: {
		js: 'app/js/scripts.js',
		html: 'app/*.html',
		pug: 'app/pug/*.pug',
		img: 'app/image/**/**/*.*',
		svg: 'app/svg/*.svg',
		style: 'app/scss/styles.scss',
		fonts: 'app/fonts/**/*.*'
	},
	watch: {
		js: 'app/js/**/*.js',
		pug: 'app/pug/**/*.pug',
		img: 'app/image/**/**/***.*',
		svg: 'app/svg/*.svg',
		css: 'app/scss/**/*.scss',
		fonts: 'app/fonts/**/*.*',
	},
	sftp: {
		styles: './style*'
	},
	clean: {
		css: './stylesheet/stylesheet.css',
		js: './js/*.js',
		html: './*.html'
	}
};

/* настройки сервера */
var config = {
	server: {
		/*baseDir: './'*/
		proxy: `${domain}`,
		//server: { baseDir: 'app' },
		notify: false,
		// online: false, // Work offline without internet connection
		// tunnel: true,
		// tunnel: "gulp-opencart", //Demonstration page: http://gulp-opencart.localtunnel.me
	},
	notify: false
};

/* подключаем gulp и плагины */
var gulp = require('gulp'),  // подключаем Gulp
	webserver = require('browser-sync'), // сервер для работы и автоматического обновления страниц
	plumber = require('gulp-plumber'), // модуль для отслеживания ошибок
	rigger = require('gulp-rigger'), // модуль для импорта содержимого одного файла в другой
	sourcemaps = require('gulp-sourcemaps'), // модуль для генерации карты исходных файлов
	sass = require('gulp-sass'), // модуль для компиляции SASS (SCSS) в CSS
	autoprefixer = require('gulp-autoprefixer'), // модуль для автоматической установки автопрефиксов
	cleanCSS = require('gulp-clean-css'), // плагин для минимизации CSS
	uglify = require('gulp-uglify'), // модуль для минимизации JavaScript
	cache = require('gulp-cache'), // модуль для кэширования
	imagemin = require('gulp-imagemin'), // плагин для сжатия PNG, JPEG, GIF и SVG изображений
	jpegrecompress = require('imagemin-jpeg-recompress'), // плагин для сжатия jpeg
	pngquant = require('imagemin-pngquant'), // плагин для сжатия png
	rimraf = require('gulp-rimraf'), // плагин для удаления файлов и каталогов
	svgSprite = require('gulp-svg-sprite'),
	pug = require('gulp-pug'),
	htmlValidator = require('gulp-w3c-html-validator'),
	svgmin = require('gulp-svgmin'),
	cheerio = require('gulp-cheerio'),
	replace = require('gulp-replace'),
	ftp = require('gulp-sftp'),
	rename = require('gulp-rename');

// SFTP
gulp.task('deploy', function () {
	return gulp.src(path.sftp.styles)
		.pipe(sftp({
			host: '',
			user: '',
			/*pass: '1234',*/
			remotePath: ''
		}));
});
// запуск сервера
gulp.task('webserver', function () {
	webserver(config.server);
});

// сбор pug
gulp.task('pug:build', function () {
	return gulp.src(path.src.pug)
		.pipe(plumber())
		.pipe(pug())
		.pipe(plumber.stop())
		.pipe(htmlValidator())
		.pipe(gulp.dest(path.build.html))
		.pipe(webserver.reload({stream: true}));
});

// сбор стилей
gulp.task('css:build', function () {
	return gulp.src(path.src.style) // получим main.scss
		.pipe(plumber()) // для отслеживания ошибок
		.pipe(sourcemaps.init()) // инициализируем sourcemap
		.pipe(sass()) // scss -> css
		.pipe(autoprefixer()) // добавим префиксы
		.pipe(gulp.dest(path.build.css))
		.pipe(rename({suffix: ''}))
		.pipe(cleanCSS()) // минимизируем CSS
		.pipe(sourcemaps.write('./')) // записываем sourcemap
		.pipe(gulp.dest(path.build.css)) // выгружаем в build
		.pipe(webserver.reload({stream: true})); // перезагрузим сервер
});

// сбор js
gulp.task('js:build', function () {
	return gulp.src(path.src.js) // получим файл main.js
		.pipe(plumber()) // для отслеживания ошибок
		.pipe(rigger()) // импортируем все указанные файлы в main.js
		.pipe(gulp.dest(path.build.js))
		.pipe(rename({suffix: ''}))
		.pipe(sourcemaps.init()) //инициализируем sourcemap
		.pipe(uglify()) // минимизируем js
		.pipe(sourcemaps.write('./')) //  записываем sourcemap
		.pipe(gulp.dest(path.build.js)) // положим готовый файл
		.pipe(webserver.reload({stream: true})); // перезагрузим сервер
});

// перенос шрифтов
gulp.task('fonts:build', function () {
	return gulp.src(path.src.fonts)
		.pipe(gulp.dest(path.build.fonts));
});

// обработка картинок
gulp.task('image:build', function () {
	return gulp.src(path.src.img) // путь с исходниками картинок
		.pipe(cache(imagemin([ // сжатие изображений
			imagemin.gifsicle({interlaced: true}),
			jpegrecompress({
				progressive: true
			}),
			pngquant(),
			imagemin.svgo({plugins: [{removeViewBox: false}]})
		])))
		.pipe(gulp.dest(path.build.img)); // выгрузка готовых файлов
});

gulp.task('svg:build', function () {
	return gulp.src(path.src.svg)
		.pipe(svgmin({
			js2svg: {
				pretty: true
			}
		}))
		.pipe(cheerio({
			run: function ($) {
				$('[fill]').removeAttr('fill');
				$('[stroke]').removeAttr('stroke');
				$('[style]').removeAttr('style');
			},
			parserOptions: {xmlMode: true}
		}))
		.pipe(replace('&gt;', '>'))
		.pipe(svgSprite({
			mode: {
				symbol: {
					sprite: "sprite.svg"
				}
			}
		}))
		.pipe(gulp.dest('./img/sprite'));
});

// удаление каталога build
gulp.task('clean:build', function () {
	return gulp.src([path.clean.css, path.clean.js], {read: false})
		.pipe(rimraf());
});

// сборка
gulp.task('build',
	gulp.series(/*'clean:build',*/
		gulp.parallel(
			/*'pug:build', 'css:build', 'js:build','fonts:build', 'image:build', 'svg:build'*/
			'css:build', 'js:build', 'fonts:build', 'image:build', 'svg:build'
		)
	)
);

// очистка кэша
gulp.task('cache:clear', function () {
	cache.clearAll();
});

// запуск задач при изменении файлов
gulp.task('watch', function () {
	/*gulp.watch(path.watch.pug, gulp.series('pug:build'));*/
	gulp.watch(path.watch.css, gulp.series('css:build'));
	gulp.watch(path.watch.js, gulp.series('js:build'));
	gulp.watch(path.watch.img, gulp.series('image:build'));
	gulp.watch(path.watch.fonts, gulp.series('fonts:build'));
	gulp.watch(path.watch.svg, gulp.series('svg:build'));
	/*gulp.watch(['./template/!**!/!*.*', '../../../controller/!**!/!*.*']).on('change', webserver.reload);*/
});

gulp.task('default', gulp.series(
	'build',
	gulp.parallel(/*'webserver', */'watch')
));