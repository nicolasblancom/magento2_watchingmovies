define(['uiComponent'], function(Component){
    'use strict';

    return Component.extend({
        defaults: {
            movies: [
                {label: "Movie name 1", status: false},
                {label: "Movie name 2", status: false},
                {label: "Movie name 3", status: false},
                {label: "Movie name 4", status: true}
            ]
        },

        initObservable: function(){
            this._super().observe([
                'movies'
            ]);

            return this;
        }
    })
});