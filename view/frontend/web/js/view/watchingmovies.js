define(['uiComponent', 'jquery'], function(Component, $){
    'use strict';

    return Component.extend({
        defaults: {
            movies: [
                {id: 1, label: "Movie name 1", status: false},
                {id: 2, label: "Movie name 2", status: false},
                {id: 3, label: "Movie name 3", status: false},
                {id: 4, label: "Movie name 4", status: true}
            ]
        },

        initialize: function(){
            var self = this;
            this._super();
        },

        initObservable: function(){
            this._super().observe([
                'movies'
            ]);

            return this;
        },

        switchStatus: function (data, event) {
            const movieId = $(event.target).data('id');

            let items = this.movies().map(function(_movie){
                if (_movie.id === movieId) {
                    _movie.status = !_movie.status;
                }
                return _movie;
            });

            //console.log(items);

            this.movies(items);
        }
    })
});