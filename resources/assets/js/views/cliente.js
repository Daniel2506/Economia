/**
* Class CreateSimulador  of Backbone Router
* @daniel2506
* @link danieltrodriguez10@gmail.com
*/

//Global App Backbone
app || (app = {});

(function ($, window, document, undefined) {

    app.CreateSimulador = Backbone.View.extend({

        el: '#simulador',
        events: {
            'submit #cliente-form': 'onStore',
            'change input.change-calcule': 'changeTasaInteres'
        },
        parameters: {
        },

        /**
        * Constructor Method
        */
        initialize : function(opts) {      
            // Initialize
            if( opts !== undefined && _.isObject(opts.parameters) )
                this.parameters = $.extend({}, this.parameters, opts.parameters);
            // Events
            this.listenTo( this.model, 'change', this.render );
            this.listenTo( this.model, 'sync', this.responseServer );
            this.listenTo( this.model, 'request', this.loadSpinner );
        },

        /**
        * Event Create Simulador
        */
        onStore: function(e) {
            if (!e.isDefaultPrevented()) {
            
                e.preventDefault();
                var data = window.Misc.formToJson( e.target );
                this.model.save( data, {patch: true, silent: true} );

            }
        },
        /**
        *
        */
        changeTasaInteres: function(e){
            console.log(e.target);
        },

        /*
        * Render View Element
        */
        render: function() {

        },
        
        /**
        * fires libraries js
        */
        ready: function () {
            // to fire plugins
            if( typeof window.initComponent.initToUpper == 'function' )
                window.initComponent.initToUpper();

            if( typeof window.initComponent.initSpinner == 'function' )
                window.initComponent.initSpinner();         
        },

        /**
        * Load spinner on the request
        */
        loadSpinner: function (model, xhr, opts) {
            window.Misc.setSpinner( this.el );
        },
        /**
        * response of the server
        */
        responseServer: function ( model, resp, opts ) {
            window.Misc.removeSpinner( this.el );
            console.log(model);
            if(!_.isUndefined(resp.success)) {
                // response success or error
                var text = resp.success ? '' : resp.errors;
                if( _.isObject( resp.errors ) ) {
                    text = window.Misc.parseErrors(resp.errors);
                }

                if( !resp.success ) {
                    alertify.error(text);
                    return;
                }

                // window.Misc.redirect( window.Misc.urlFull( Route.route('cliente.index')) );
            }
        }
    });

})(jQuery, this, this.document);