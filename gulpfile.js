// Initialize modules
// Importing specific gulp API functions lets us write them below as series() instead of gulp.series()
const { src, dest, watch, series, parallel } = require('gulp');
// Importing all the Gulp-related packages we want to use
const sass = require('gulp-sass')(require('sass')); // require sass in order to use the gulp-sass plugin
const concat = require('gulp-concat'); // for concatenating files
const uglify = require('gulp-uglify'); // for minifying JS files
const replace = require('gulp-replace'); // for replacing strings in files
const typescript = require('gulp-typescript'); // for compiling TypeScript code to JavaScript

// Declare file paths
const files = { 
    scssPath: [ 
        'sass/*.scss',
        'sass/*/*.scss',
    ],
    jsPaths: [
        'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js',
        'node_modules/swiper/swiper-bundle.min.js',
        'js/navigation.js',
    ],    
    tsPaths: [
        'ts/functionality.ts',
        // 'ts/swiper.ts',
    ]    
}

// Define tasks

// Compile SCSS to CSS, concatenate, and save to the root directory
function scssTask(){     
    const timestamp = Math.floor(Date.now() / 1000);
    return src( files.scssPath ) 
        .pipe(replace(/(Version:\s+\d+\.\d+\.\d+\.)(\d+)/, `$1${timestamp}`))
        .pipe(sass()) // compile SCSS to CSS
        // .pipe( replace('../webfonts/fa-', 'webfonts/fa-') )  // if I want to use webfonts
        .pipe(concat('style.css'))
        .pipe(dest('./'))
}

// Compile TypeScript code to JavaScript and save to the build directory
async function jsTask() {
    // Check if the array of file paths is empty
    if (files.jsPaths.length === 0) {
        console.log("No JavaScript files found for processing");
        return; // Return early if there are no files to process
    }
    return src(files.jsPaths)
        .pipe(concat('core.min.js')) // concatenate all the files into a single file
        .pipe(uglify()) // minify the concatenated file
        .pipe(dest('js')); // save the file to the js directory
}

async function tsTask() {
    // Check if the array of file paths is empty
    if (files.tsPaths.length === 0) {
        console.log("No TypeScript files found for processing");
        return; // Return early if there are no files to process
    }
    return src(files.tsPaths)
    .pipe(typescript())
    .pipe(concat('corets.min.js')) // concatenate all the files into a single file
    .pipe(uglify()) // minify the concatenated file
    .pipe(dest('js'));
}

// Watch task: watch SCSS and JS files for changes
async function watchTask(){

    watch(files.scssPath, // watch the scssPath array for changes
        {interval: 1000, usePolling: true}, // use polling to fix issues in some environments
        series( // run the tasks in series
            parallel( scssTask ) // run the scssTask in parallel
        )
    );      
    watch(files.jsPaths, // watch the jsPaths array for changes
        {interval: 1000, usePolling: true}, // use polling to fix issues in some environments
        series( // run the tasks in series
            parallel( jsTask ) // run the jsTask in parallel
        )
    );  
    watch(files.tsPaths, // watch the tsTask array for changes
        {interval: 1000, usePolling: true}, // use polling to fix issues in some environments
        series( // run the tasks in series
            parallel( tsTask ) // run the jsTask in parallel
        )
    );  
}

// Export the default Gulp task so it can be run
exports.default = series(
    scssTask, // run the scssTask first
    jsTask, // run the jsTask next
    tsTask, // run the tsTask next
    watchTask,
);