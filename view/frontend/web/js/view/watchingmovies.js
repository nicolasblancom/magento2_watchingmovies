define(['uiComponent'], function(Component){
    'use strict';

    return Component.extend({
        defaults: {
            movies: [
                {label: "Movie name 1"},
                {label: "Movie name 2"},
                {label: "Movie name 3"},
                {label: "Movie name 4"}
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