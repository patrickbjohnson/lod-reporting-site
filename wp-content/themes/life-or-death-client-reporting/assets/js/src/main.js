var ComponentRegistry = require('./lib/componentRegistry');

/*-------------------------------------------- */
/** Instantiate Modules */
/*-------------------------------------------- */

var componentRegistry = new ComponentRegistry();
var svg4everybody = require('svg4everybody');
svg4everybody();

/*
    data-js-component="moduleName" goes on your module's markup
    componentRegistry.registerComponent('moduleName', require('./modules/moduleName'));
*/

componentRegistry.registerComponent('nav', require('./modules/nav'));


componentRegistry.initComponents();

/*-------------------------------------------- */
/** End Modules */
/*-------------------------------------------- */