  jQuery("#smooth-accordion-warp").collapse({
      accordion: true,
      open: function() {
        this.addClass("open");
        this.css({ height: this.children().outerHeight() });
      },
      close: function() {
        this.css({ height: "0px" });
        this.removeClass("open");
      }
    });

  (function() {
    tinymce.create('tinymce.plugins.WPTuts', {
        /**
         * Initializes the plugin, this will be executed after the plugin has been created.
         * This call is done before the editor instance has finished it's initialization so use the onInit event
         * of the editor instance to intercept that event.
         *
         * @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
         * @param {string} url Absolute URL to where the plugin is located.
         */
        init : function(ed, url) {
            ed.addCommand('smabutton', function() {
                return_text = '[sawarp][sawcon title="Here Is Your Title"]Your content goes here....[/sawcon] [sawcon title="Here Is Your Title"]Your content goes here....[/sawcon] [sawcon title="Here Is Your Title"]Your content goes here....[/sawcon][/sawarp]';
                ed.execCommand('mceInsertContent', 0, return_text);
            });

           
            ed.addButton('smabutton', {
                title : 'Insert accordion toggle shortcode',
                cmd : 'smabutton',
                image : url + '/btn.png'
            });

        },

        /**
         * Creates control instances based in the incomming name. This method is normally not
         * needed since the addButton method of the tinymce.Editor class is a more easy way of adding buttons
         * but you sometimes need to create more complex controls like listboxes, split buttons etc then this
         * method can be used to create those.
         *
         * @param {String} n Name of the control to create.
         * @param {tinymce.ControlManager} cm Control manager to use inorder to create new control.
         * @return {tinymce.ui.Control} New control instance or null if no control was created.
         */
        createControl : function(n, cm) {
            return null;
        },

    });

    // Register plugin
    tinymce.PluginManager.add('wptuts', tinymce.plugins.WPTuts);
})();