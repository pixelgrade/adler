'use strict';
var through = require('through2'),
	gutil = require('gulp-util'),
	compressor = require('./yuicompressor');

module.exports = function (opt) {

	function compress(file, encoding, callback) {
		/*jshint validthis:true */

		if (file.isNull()) {
			this.push(file);
			return callback();
		}

		if (file.isStream()) {
			this.emit('error', new gutil.PluginError('gulp-yuicompressor', 'Streams are not supported!'));
		}

		var that = this;
		compressor.compress(String(file.contents), opt || {}, function(err, data, extra) {
			//err   If compressor encounters an error, it's stderr will be here
			//data  The compressed string, you write it out where you want it
			//extra The stderr (warnings are printed here in case you want to echo them
			if(err){
				that.emit('error', new gutil.PluginError('gulp-yuicompressor', String(err), {
					fileName: file.path
				}));
			}else{
				file.contents = new Buffer(data);
				that.push(file);

				callback();
			}
		});

	}

	return through.obj(compress);
};