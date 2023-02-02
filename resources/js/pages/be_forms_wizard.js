/*
 *  Document   : be_forms_wizard.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Form Wizard Page
 */

class BeFormWizard {
    /*
     * Init Wizard defaults
     *
     */
    static initWizardDefaults() {
        jQuery.fn.bootstrapWizard.defaults.tabClass         = 'nav nav-tabs';
        jQuery.fn.bootstrapWizard.defaults.nextSelector     = '[data-wizard="next"]';
        jQuery.fn.bootstrapWizard.defaults.previousSelector = '[data-wizard="prev"]';
        jQuery.fn.bootstrapWizard.defaults.firstSelector    = '[data-wizard="first"]';
        jQuery.fn.bootstrapWizard.defaults.lastSelector     = '[data-wizard="last"]';
        jQuery.fn.bootstrapWizard.defaults.finishSelector   = '[data-wizard="finish"]';
        jQuery.fn.bootstrapWizard.defaults.backSelector     = '[data-wizard="back"]';
    }

    /*
     * Init simple wizard, for more examples you can check out https://github.com/VinceG/twitter-bootstrap-wizard
     *
     */
    static initWizardSimple() {
        jQuery('.js-wizard-simple').bootstrapWizard();
    }

    /*
     * Init wizards with validation, for more examples you can check out
     * https://github.com/VinceG/twitter-bootstrap-wizard and https://github.com/jzaefferer/jquery-validation
     *
     */
    /*
     * Init functionality
     *
     */
    static init() {
        this.initWizardDefaults();
        this.initWizardSimple();
    }
}

// Initialize when page loads
// jQuery(() => { BeFormWizard.init(); });
