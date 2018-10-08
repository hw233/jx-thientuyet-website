(function(window) {
    var Preloader = function() {
        this.ui = {
            $loading: $("#Loading"),
            $loadingText: $("#Loading #loaderText")
        };
        var that = this;
        this.queue = new createjs.LoadQueue(false);
        this.queue.installPlugin(createjs.Sound);
        this.queue.on('complete', that.handleCompleted, this);
        this.queue.on('error', that.handleError, this);
        this.queue.on('progress', that.handleProgress, this);
        this.queue.on('fileload', that.handleFileLoad, this);
    };
	
    Preloader.
    prototype = {
        enter: function(manifest) {
            this.queue.loadManifest(manifest);
        },
        exit: function() {
            this.onExit = null;
            delete this.onExit;
        },
        getResult: function(e) {
            return this.queue.getResult(e);
        },
        handleFileLoad: function() {},
        handleError: function(e) {},
        handleProgress: function(e) {
            var percent = Math.round((this.queue.progress.toFixed(2)) * 100);
            num_percent = percent + '%';
            this.ui.$loadingText.text(num_percent);
        },
        handleFileProgress: function(e) {},
        handleCompleted: function(e) {
            this.exit();
        }
    };
    window.Preloader = Preloader;
})(window);

$(document).ready(function() {
    var manifest = [{
        id: 'bg0',
        src: 'images/event-page.jpg'
    }, {
        id: 'bg1',
        src: 'images/event-page-evt-1.jpg'
    }, {
        id: 'bg2',
        src: 'images/event-page-evt-2.jpg'
    }, {
        id: 'bg3',
        src: 'images/event-page-evt-3.jpg'
    }, {
        id: 'bg4',
        src: 'images/event-page-evt-4.jpg'
    }, {
        id: 'bg5',
        src: 'images/event-page-evt-5.jpg'
    }, ];
    var loader = new Preloader();
    var loadEvt = function(preloader, resources, callback) {
        preloader.exit =
            function() {
                callback();
            };
        preloader.enter(manifest);
    };
    loadEvt(loader, manifest,
        function() {
            $.each($(".group-slide .slide-item"),
                function(i, e) {
                    $(this).attr('style', 'background : url(' + loader.getResult('bg' + i).src + ')');
                });
            $("#Loading").hide();
        });
    var actSld = 0,
        actScr = false,
        timeout, contentHeight = $(document).height(),
        lastSld = 0,
        lastInSld = 0,
        allowScroll = false;
    $(".context").slimscroll({
        height: (contentHeight - 150) + 'px',
        railVisible: false,
        wheelStep: 3,
        color: '#fff',
        disableFadeOut: false
    });

    function _defaultContent() {
        $('.content').css({
            height: '1px',
            top: contentHeight / 2 + 'px'
        });
    }
    _defaultContent();
    $(".slide-item:first-child .content").css({
        top: 0,
        height: contentHeight + 'px',
    });

    function _changeSlide(position) {
        _defaultContent();
        var top = (position) * 910 * -1;
        lastSld = position;
        $(".event-item").removeClass('act');
        if (position) {
            $(".event-item:nth-child(" + position + ")").addClass('act');
        }
        clearTimeout(timeout);
        $(".group-slide").css({
            top: top + 'px'
        });
        timeout = setTimeout(function() {
            $('.content').css({
                height: contentHeight + 'px',
                top: 0
            });
            actScr = false;
        }, 1000);
    }
    $(".group-context").hover(function() {
        allowScroll = false;
    }, function() {
        allowScroll = false;
    });
    var mousewheelevt = (/Firefox/i.test(navigator.userAgent)) ? "DOMMouseScroll" : "mousewheel";
    $('.slide-block').bind(mousewheelevt, function(e) {
        if (allowScroll) {
            var evt = window.event || e;
            evt = evt.originalEvent ? evt.originalEvent : evt;
            var delta = evt.detail ? evt.detail * (-40) : evt.wheelDelta;
            if (actScr) {
                lastInSld = actSld;
                if (lastInSld == actSld) {
                    actScr = false;
                }
                if (delta > 0) {
                    if (actSld - 1 < 0) {
                        actScr = false;
                    } else {
                        actSld -= 1;
                        actScr = false;
                    }
                } else {
                    if (actSld + 1 > 3) {
                        actScr = false;
                    } else {
                        actScr = false;
                        actSld += 1;
                    }
                }
                actScr = false;
                _changeSlide(actSld);
            }
        }
    });
    $(".event-item").click(function() {
        actSld = $(this).index() + 1;
        _changeSlide(actSld);
    });
    $(".button-slide[data-position]").click(function() {
        var position = $(this).data('position');
        _changeSlide(position);
    });
});