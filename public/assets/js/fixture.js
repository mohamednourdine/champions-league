$(document).ready(function() {

    if(window.matchMedia('(max-width: 768px)').matches) {
        $('#main').removeClass("align-items-center").addClass("mt-1");
        $('#fixture-main').removeClass("m-3").addClass("my-2");
    }

    $(window).resize(function() {
        if(window.matchMedia('(max-width: 768px)').matches) {
            $('#main').removeClass("align-items-center").addClass("mt-1");
            $('#fixture-main').removeClass("m-3").addClass("my-2");
        }
        else {
            $('#main').removeClass("mt-3").addClass("align-items-center");
            $('#fixture-main').removeClass("m-1").addClass("m-3");
        }
    });

    var otherheight = $('#fixtureaccordion').height() - $('.weeks-nav').height() - $('.weeks-title').outerHeight(true);
    $('#weeks-col').css('height', otherheight+'px');

    $('#fixtureaccordion').on('hidden.bs.collapse shown.bs.collapse', function (e) {
        var otherheight = $('#fixtureaccordion').height() - $('.weeks-nav').height() - $('.weeks-title').outerHeight(true);
        $('#weeks-col').animate({ height:otherheight+'px' }, 400);
        window.setTimeout(function() {
            $("div.week.week-active")[0].scrollIntoView({behavior: 'smooth', block: 'nearest', inline: 'start'});
        }, 500);
    });

    $("div.week.week-active")[0].scrollIntoView({behavior: 'smooth', block: 'nearest', inline: 'start'});

    $('div.week').on('click', function() {
        $('.week').not($(this).parent()).removeClass('week-active');
        $(this).addClass('week-active');
        $("div.week.week-active")[0].scrollIntoView({behavior: 'smooth', block: 'nearest', inline: 'start'});
    });
    $('.weeks-dropdown .dropdown-item').on('click', function() {
        $('.dropdown-item').not($(this).parent()).removeClass('active');
        $(this).addClass('active');
    });

    // Mobile device scroll to week
    $(".dropdown").on("shown.bs.dropdown", function() {
        $(this).find(".dropdown-menu li a.active").focus()
    });
    
    var div = $('#weeks-col');
    $('#weeksup').on('mousedown', function(){
        div.animate({ scrollTop: div.scrollTop() - 150 }, 200);
    });
    $('#weeksdown').on('mousedown', function(){
        div.animate({ scrollTop: div.scrollTop() + 150 }, 200);
    });

});