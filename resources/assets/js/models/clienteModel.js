/**
* Class ClienteModel extend of Backbone Model
* @daniel2506
* @link danieltrodriguez10@gmail.com
*/

//Global App Backbone
app || (app = {});

(function (window, document, undefined) {

    app.ClienteModel = Backbone.Model.extend({

        urlRoot: function () {
            return window.Misc.urlFull( Route.route('cliente.index') );
        },
        idAttribute: 'id',
        defaults: {
	
        }
    });

})(this, this.document);
