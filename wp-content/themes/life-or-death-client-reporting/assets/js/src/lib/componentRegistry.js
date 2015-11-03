'use strict';

var $ = require('jquery');
/*-------------------------------------------- */
/** Exports */
/*-------------------------------------------- */

module.exports = ComponentRegistry;

/*-------------------------------------------- */
/** Functions */
/*-------------------------------------------- */

function ComponentRegistry() {
  this.registeredComponents = {};
}

$.extend(ComponentRegistry.prototype, {

  registerComponent: function(key, fn) {
    this.registeredComponents[key] = fn;
  },

  initComponents: function(context) {
    context = context || 'body';

    var _this = this,
        $components = $(context).find('[data-js-component]');

    $components.each(function(i, el) {
      var key = $(el).data('js-component');

      _this.registeredComponents[key] && _this.registeredComponents[key](el);
    });
  }
});