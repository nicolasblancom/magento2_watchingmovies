define([
    'uiComponent',
    'jquery',
    'ko',
    'Magento_Ui/js/modal/confirm',
    'NicolasBlancoM_WatchingMovies/js/service/watchingmovies'
    ], function(Component, $, ko, confirmation, watchingMoviesService){
    'use strict';

    var self;

    return Component.extend({
        defaults: {
            newMovieLabel: '',
            movies: [
                /*{id: 1, label: "Movie name 1", status: false},
                {id: 2, label: "Movie name 2", status: false},
                {id: 3, label: "Movie name 3", status: false},
                {id: 4, label: "Movie name 4", status: true}*/
            ],
            movies2: [
                /*ko.observable({movie_id: 1, label: "Movie name 1", status: 'open'}),
                ko.observable({movie_id: 2, label: "Movie name 2", status: 'open'}),
                ko.observable({movie_id: 3, label: "Movie name 3", status: 'open'}),
                ko.observable({movie_id: 4, label: "Movie name 4", status: 'complete'})*/
            ]
        },

        initialize: function(){
            self = this;
            this._super();
        },

        initObservable: function(){
            this._super().observe([
                'newMovieLabel',
                'movies',
                'movies2'
            ]);

            // use web api to get list of movies (movies: using 'repeat' binding in view)
            watchingMoviesService.getList().then(function (_movies) {
                self.movies(_movies);

                return this;
            });

            // use web api to get list of movies (movies2: using 'foreach' binding in view)
            watchingMoviesService.getList().then(function (_movies) {
                _movies.forEach(function (_movie) {
                    self.movies2.push(
                        ko.observable(_movie)
                    );
                });

                return this;

            });

            return this;
        },

        switchStatus: function (data, event) {
            const movieId = $(event.target).data('id');

            let items = this.movies().map(function(_movie){
                if (_movie.movie_id === movieId) {
                    _movie.status = _movie.status === 'open' ? 'complete' : 'open';
                    watchingMoviesService.update(_movie.movie_id, _movie.status);
                }
                return _movie;
            });

            this.movies(items);
        },
        switchStatus2: function (data, event) {
            const movieId = $(event.target).data('id');

            let items = self.movies2().map(function(_movie){

                if (_movie().movie_id === movieId) {
                    _movie().status = _movie().status === 'open' ? 'complete' : 'open';
                    watchingMoviesService.update(_movie().movie_id, _movie().status);
                }

                return ko.observable(_movie());
            });

            self.movies2(items);
        },

        deleteMovie: function (movieId) {
            let theMovie = self.getMovieById(movieId),
                movieLabel = theMovie ? theMovie.label : $.mage.__('No title');

            confirmation({
                title: $.mage.__('Delete this movie?'),
                content: $.mage.__('Are you sure you want to delete "' + movieLabel + '" movie?'),
                actions: {
                    confirm: function () {
                        let remainingMovies = [];

                        self.movies().forEach(function (_movie) {
                            if(_movie.movie_id !== movieId){
                                remainingMovies.push(_movie);
                            } else {
                                // console.log(_movie);
                            }
                        });

                        self.movies(remainingMovies);
                    },
                    cancel: function () {
                        console.log('canceled');
                    },
                    always: function () {
                        console.log('always')
                    }
                },
                buttons: [{
                    text: $.mage.__('Do not delete'),
                    class: 'action-secondary action-dismiss',
                    click: function (event) {
                        this.closeModal(event);
                    }
                }, {
                    text: $.mage.__('Delete the movie'),
                    class: 'action-primary action-accept',
                    click: function (event) {
                        this.closeModal(event, true);
                    }
                }]
            });
        },
        deleteMovie2: function (movieId) {
            let theMovie = self.getMovieById(movieId),
                movieLabel = theMovie ? theMovie.label : $.mage.__('No title');

            confirmation({
                title: 'Are you deleting this movie?',
                content: 'Sure? "'+ movieLabel +'" is the movie you want to delete?',
                actions: {
                    confirm: function () {
                        let remainingMovies = [];

                        self.movies2().forEach(function (_movie) {
                            if(_movie().movie_id !== movieId){
                                console.log(_movie);
                                remainingMovies.push(ko.observable(_movie()));
                            } else {
                                // console.log(_movie());
                            }
                        });

                        self.movies2(remainingMovies);
                    },
                    cancel: function () {
                        console.log('canceled');
                    },
                    always: function () {
                        console.log('always')
                    }
                },
                buttons: [{
                    text: $.mage.__('Cancel! NOW!'),
                    class: 'action-secondary action-dismiss',
                    click: function (event) {
                        this.closeModal(event);
                    }
                }, {
                    text: $.mage.__('Of course ;)'),
                    class: 'action-primary action-accept',
                    click: function (event) {
                        this.closeModal(event, true);
                    }
                }]
            });
        },

        getMovieById: function (movieId) {
            let theMovie = false;

            self.movies().forEach(function (_movie) {
                if (_movie.movie_id === movieId) {
                    console.log(_movie);
                    theMovie = _movie;
                }
            });

            return theMovie;
        },

        addMovie: function () {
            self._addMovieHelper1();
            self._addMovieHelper2();
            self.newMovieLabel('');
        },

        _addMovieHelper1: function () {
            self.movies.push({
                movie_id: Math.floor(Math.random() * 100),
                label: self.newMovieLabel(),
                status: 'open'
            });

            // console.log(self.movies());
        },

        _addMovieHelper2: function () {
            let theMovie = ko.observable({
                movie_id: Math.floor(Math.random() * 100),
                label: self.newMovieLabel(),
                status: 'open'
            });
            self.movies2.push(theMovie);

            // console.log(self.movies2());
        },

        checkKey: function (data, event) {
            if (event.keyCode === 13) {
                self.addMovie();
            }
        }
    })
});