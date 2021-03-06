/**
* Class AppRouter  of Backbone Router
* @daniel2506
* @link danieltrodriguez10@gmail.com
*/

//Global App Backbone
app || (app = {});

(function ($, window, document, undefined) {

    app.AppRouter = new( Backbone.Router.extend({
        routes : {
            //Cliente
            'cliente(/)': 'getCreateSimulador',
        },

        /**
        * Parse queryString to object
        */
        parseQueryString : function(queryString) {
            var params = {};
            if(queryString) {
                _.each(
                    _.map(decodeURI(queryString).split(/&/g),function(el,i){
                        var aux = el.split('='), o = {};
                        if(aux.length >= 1){
                            var val = undefined;
                            if(aux.length == 2)
                                val = aux[1];
                            o[aux[0]] = val;
                        }
                        return o;
                    }),
                    function(o){
                        _.extend(params,o);
                    }
                );
            }
            return params;
        },

        /**
        * Constructor Method
        */
        initialize : function ( opts ){
            // Initialize resources
        },

        /**
        * Start Backbone history
        */
        start: function () {
            var config = { pushState: true };

            if( document.domain.search(/(104.236.57.82|localhost)/gi) != '-1' )
                config.root = '/economia/public/';

            Backbone.history.start( config );
        },

        /**
        * show view in Calendar Event
        * @param String show
        */
        getCreateSimulador: function () {
            this.clientModel = new app.ClienteModel();

            if ( this.CreateSimuladorView instanceof Backbone.View ){
                this.CreateSimuladorView.stopListening();
                this.CreateSimuladorView.undelegateEvents();
            }
            this.CreateSimuladorView = new app.CreateSimulador({ model: this.clientModel });
        },
    }) );
})(jQuery, this, this.document);