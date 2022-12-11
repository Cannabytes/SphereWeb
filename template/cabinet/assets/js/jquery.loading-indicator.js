;(function ( $, window, document, undefined ) {
		// Defaults
		var pluginName = "loadingIndicator",
				defaults = {
					useImage: false,
					showOnInit: true,
					loadingImage: "../src/images/loader.gif",
					loadingClass: "loader",
					wrapperClass: "loading-indicator-wrapper"
			};

		// Constructor
		function Plugin ( element, options ) {
				this.element = element;
				this.$wrapper = null;
				this.options = $.extend( {}, defaults, options );
				this._defaults = defaults;
				this._name = pluginName;
				this.init();
		}

		// Prototype
		Plugin.prototype = {
				init: function () {
					this.addLoader();
					if (this.options.showOnInit) {
						this.show();
					} else {
						this.hide();
					}
				},
				addLoader: function () {
					var $wrapper = this.createDOM();
					this.$wrapper = $wrapper;
					$(this.element).append($wrapper);
				},
				createDOM: function() {
					var $wrapper = $('<div class="' + this.options.wrapperClass + '"></div>'),
						$helper = $('<span class="loading-indicator-helper"></span>'),
						$indicator = this.options.useImage ? $('<img src="' + this.options.loadingImage + '" />') : $('<div class="' + this.options.loadingClass + '"></div>');
					$wrapper.append($helper);
					$wrapper.append($indicator);
					return $wrapper;
				},
				show: function() {
					$(this.$wrapper).removeClass("loader-hidden").addClass("loader-visible");
				},
				hide: function() {
					$(this.$wrapper).removeClass("loader-visible").addClass("loader-hidden");
				}
		};

		// A really lightweight plugin wrapper around the constructor,
		// preventing against multiple instantiations
		$.fn[ pluginName ] = function ( options ) {
				return this.each(function() {
						if ( !$.data( this, pluginName ) ) {
								$.data( this, pluginName, new Plugin( this, options ) );
						}
				});
		};

})( jQuery, window, document );
