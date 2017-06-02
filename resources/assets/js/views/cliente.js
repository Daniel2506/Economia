/**
* Class CreateSimulador  of Backbone Router
* @daniel2506
* @link danieltrodriguez10@gmail.com
*/

//Global App Backbone
app || (app = {});

(function ($, window, document, undefined) {

    app.CreateSimulador = Backbone.View.extend({

        el: 'body',
        templateAmortizacion: _.template(($('#show-amortizacion-tpl').html() || '') ),
        templateGracia: _.template(($('#show-gracia-tpl').html() || '') ),
        events: {
            'submit #cliente-form': 'onStore',
            'change #ea_cliente': 'changeEA',
            'change #nominal_anual_cliente': 'changeNominal',
            'change #ip_cliente': 'changeInterePeriodico'
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

            this.$wraperForm = this.$('#simulador');
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
        changeEA: function(e){
            e.preventDefault();
            var periodo = this.$('#periodo_cliente').val();
            var dias = (12 / periodo) * 30;
            var efectivoAnual = (this.$( e.target ).val() / 100);
            var interesP = (Math.pow((1 + efectivoAnual) , (dias/360)));
                interesP = interesP - 1;
                interesP = interesP * 100;
            var nominal = interesP * periodo;
            this.$('#ip_cliente').val(interesP.toFixed(2));
            this.$('#nominal_anual_cliente').val(nominal.toFixed(2));
        }, 
        /**
        *
        */
        changeNominal: function(e){
            var periodo = this.$('#periodo_cliente').val();
                dias = (12 / periodo) * 30;
                interesP = (this.$(e.target).val() / periodo);
                efectivoAnual = Math.pow((1 + (interesP/100)) , (360/dias));
                efectivoAnual = efectivoAnual - 1; 
                efectivoAnual = efectivoAnual * 100;
            this.$('#ip_cliente').val(interesP.toFixed(2));
            this.$('#ea_cliente').val(efectivoAnual.toFixed(2));

        }, 
        /**
        *
        */
        changeInterePeriodico: function(e){
            var periodo = this.$('#periodo_cliente').val();
                dias = (12 / periodo) * 30;
                interesP =  this.$( e.target ).val();
                nominal =  periodo * interesP;
                efectivoAnual = Math.pow((1 + (interesP/100)) , (360/dias));
                efectivoAnual = efectivoAnual - 1; 
                efectivoAnual = efectivoAnual * 100; 
            this.$('#nominal_anual_cliente').val(nominal.toFixed(2));
            this.$('#ea_cliente').val(efectivoAnual.toFixed(2));

        },

        /*
        * Render View Element
        */
        render: function() {
            var attributes = this.model.toJSON();
            if (this.model.has('check_periodo_gracia')) {
                this.$wraperForm.empty().html( this.templateGracia(attributes) );
            }else{
                console.log(attributes.fecha);
                this.$wraperForm.empty().html( this.templateAmortizacion(attributes) );
            }
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
                this.render();
            }
        }
    });

})(jQuery, this, this.document);