var dontpushpush = new Vue({
    el: '#dontpushpush',
    data: {
        highlight: [],
        articles: [],
        article: {}
    },
    ready: function() {
        $.ajax({
            url: 'API/v1/highlight',
            success: function(response) {
                dontpushpush.highlight = response;
            }
        });

        $.ajax({
            url: 'API/v1/articles',
            success: function(response) {
                dontpushpush.articles = response;
                var paging = new Array();
                var limit = (response.last_page > 3)? 3 : response.last_page;



                for(var index = 1; index <= limit; index++) {

                    if(response.next_page_url) {
                        var url = response.next_page_url.substring(0, response.next_page_url.length - 1) + index
                    }
                    else {
                        var url = '';
                    }

                    paging.push({
                        index: index,
                        url: url
                    });
                }

                dontpushpush.articles.paging = paging;
            }
        });
    },
    methods: {
        paging: function(e) {

            e.preventDefault();

            if(dontpushpush.articles.current_page != e.target.text && e.target.href != undefined) {

                $.ajax({
                    url: e.target.href,
                    success: function(response) {
                        dontpushpush.articles = response;

                        var paging = new Array();

                        //Current page more then 3 and total page more than 6
                        if(response.current_page > 3 && response.last_page > 6) {
                            var startnumber = response.current_page - 3;
                            var limit = response.current_page + 3;
                            var limit = (limit > response.last_page)? response.last_page : limit;
                        }
                        else if(response.current_page <= 3 && response.last_page > 6) {
                            var startnumber = 1;
                            var limit = response.current_page + 3;
                        }
                        //Article page is less then 6, but our current page is more than 3
                        else if(response.current_page > 3 && response.last_page <= 6) {
                            var startnumber = response.current_page - 3;
                            var limit = response.last_page;
                        }
                        else if(response.current_page <= 3 && response.last_page <= 6) {
                            var startnumber = 1;
                            var a = response.last_page - response.current_page;
                            var limit = (a > 3)? (response.current_page + 3) : response.last_page;
                        }
                        //Begin
                        else {
                            var startnumber = 1;
                            var limit = (response.last_page > 3)? 3 : response.last_page;
                        }

                        for(var index = startnumber; index <= limit; index++) {

                            var url = (response.next_page_url)? response.next_page_url : response.prev_page_url;

                            paging.push({
                                index: index,
                                url: url.substring(0, url.length - 1) + index
                            });
                        }

                        dontpushpush.articles.paging = paging;
                    }
                });

            }
        }
    }
});

$(document).ready(function() {

    $('.navigation li:nth-child(1)').addClass('active');

    $('.content').hide();
    $('#utama').show();

    var utama = function () {
        $('.content').hide();
        $('#utama').show();
        $('.navigation li').removeClass('active');
        $('.navigation li:nth-child(1)').addClass('active');
    };
    var tentang = function () {
        $('.content').hide();
        $('#tentang').show();
        $('.navigation li').removeClass('active');
        $('.navigation li:nth-child(2)').addClass('active');
    };
    var tags = function() {

    };
    var tag = function(id) {
        console.log(id);
    };
    var article = function(article) {
        $('.content').hide();
        $('#article').show();
        $('.navigation li').removeClass('active');

        $.ajax({
            url: 'API/v1/article/' + article,
            success: function(response) {
                dontpushpush.article = response;
                $('#article_content').html(marked(dontpushpush.article.content));
                $('#article img').addClass('img-responsive');
                Prism.highlightAll();
            }
        })
    };

    var router = Router({
        '/': utama,
        '/tentang': tentang,
        '/tags': tags,
        '/tags/:tagId': tag,
        'a/?((\w|.)*)': article
    });

    router.init();

});