jQuery(function($) {

  // gsap small image _smImgSlider
  function horizontalLoop(items, config) {
    items = gsap.utils.toArray(items);
    if (items.length !== 0) {
    config = config || {};
    let tl = gsap.timeline({repeat: config.repeat, paused: config.paused, defaults: {ease: "none"}, onReverseComplete: () => tl.totalTime(tl.rawTime() + tl.duration() * 100)}),
      length = items.length,
      startX = items[0].offsetLeft,
      times = [],
      widths = [],
      xPercents = [],
      curIndex = 0,
      pixelsPerSecond = (config.speed || 1) * 100,
      snap = config.snap === false ? v => v : gsap.utils.snap(config.snap || 1), // some browsers shift by a pixel to accommodate flex layouts, so for example if width is 20% the first element's width might be 242px, and the next 243px, alternating back and forth. So we snap to 5 percentage points to make things look more natural
      totalWidth, curX, distanceToStart, distanceToLoop, item, i;
    gsap.set(items, { // convert "x" to "xPercent" to make things responsive, and populate the widths/xPercents Arrays to make lookups faster.
      xPercent: (i, el) => {
        let w = widths[i] = parseFloat(gsap.getProperty(el, "width", "px"));
        xPercents[i] = snap(parseFloat(gsap.getProperty(el, "x", "px")) / w * 100 + gsap.getProperty(el, "xPercent"));
        return xPercents[i];
      }
    });
    gsap.set(items, {x: 0});
    totalWidth = items[length-1].offsetLeft + xPercents[length-1] / 100 * widths[length-1] - startX + items[length-1].offsetWidth * gsap.getProperty(items[length-1], "scaleX") + (parseFloat(config.paddingRight) || 0);
    for (i = 0; i < length; i++) {
      item = items[i];
      curX = xPercents[i] / 100 * widths[i];
      distanceToStart = item.offsetLeft + curX - startX;
      distanceToLoop = distanceToStart + widths[i] * gsap.getProperty(item, "scaleX");
      tl.to(item, {xPercent: snap((curX - distanceToLoop) / widths[i] * 100), duration: distanceToLoop / pixelsPerSecond}, 0)
        .fromTo(item, {xPercent: snap((curX - distanceToLoop + totalWidth) / widths[i] * 100)}, {xPercent: xPercents[i], duration: (curX - distanceToLoop + totalWidth - curX) / pixelsPerSecond, immediateRender: false}, distanceToLoop / pixelsPerSecond)
        .add("label" + i, distanceToStart / pixelsPerSecond);
      times[i] = distanceToStart / pixelsPerSecond;
    }
    function toIndex(index, vars) {
      vars = vars || {};
      (Math.abs(index - curIndex) > length / 2) && (index += index > curIndex ? -length : length); // always go in the shortest direction
      let newIndex = gsap.utils.wrap(0, length, index),
        time = times[newIndex];
      if (time > tl.time() !== index > curIndex) { // if we're wrapping the timeline's playhead, make the proper adjustments
        vars.modifiers = {time: gsap.utils.wrap(0, tl.duration())};
        time += tl.duration() * (index > curIndex ? 1 : -1);
      }
      curIndex = newIndex;
      vars.overwrite = true;
      return tl.tweenTo(time, vars);
    }
    tl.next = vars => toIndex(curIndex+1, vars);
    tl.previous = vars => toIndex(curIndex-1, vars);
    tl.current = () => curIndex;
    tl.toIndex = (index, vars) => toIndex(index, vars);
    tl.times = times;
    tl.progress(1, true).progress(0, true); // pre-render for performance
    if (config.reversed) {
      tl.vars.onReverseComplete();
      tl.reverse();
    }
    return tl;
    } // end if length
    }

  $(document).ready(function() {

  gsap.registerPlugin(ScrollTrigger);

  if (jQuery(".green_none").length) {
  gsap.set('.green_none', {visibility:'visible'});
  }

  let winWidth = $(window).outerWidth();

  headerHigh = $("#jr-header-sticky").height()+40;

  if ($(".filterTournResults").length) {
    var currentUrl = window.location.href;
    $.urlParam = function(name){
      var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(currentUrl);
          if (results==null) {
            return null;
          }
          return decodeURI(results[1]) || 0;
      }
    var yearP = $.urlParam('tyear');
    var stateP = $.urlParam('state');
    var divisionP = $.urlParam('division');
    var divisionP = $.urlParam('region');
    var categoryP = $.urlParam('category');

    if (yearP || stateP || divisionP || categoryP || currentUrl.includes('/page/')) {
      var target = $(".filterTournResults").offset().top-32;
      

      gsap.to($(window),.5,{scrollTo:{y:target-headerHigh}});
    }
  }

  if ($(".stateRegions").length) {
    $.urlParam = function(name){
      var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
          if (results==null) {
            return null;
          }
          return decodeURI(results[1]) || 0;
      }
    var region = $.urlParam('region');

    if (region) {
      var target = $(".stateRegions").offset().top-32;
      $("."+region).addClass("active");

      gsap.to($(window),.5,{scrollTo:{y:target-headerHigh}});
    }
  }

  if (jQuery(".jumpToLink").length) {

    $('.jumpToLink a').on('click',function(element){
      element.preventDefault();
      var targetID = $(this).attr('href');
      var target = $(targetID).offset().top;
      
      gsap.to($(window),.5,{scrollTo:{y:target-headerHigh}});
    })

  }

  //faq effects
  jQuery(".faqs_list").each(function() {

    var faq = gsap.timeline();
    faq.to( jQuery(this).find(".plus_icon"), {duration: .5, rotate: 180});
    faq.pause();

    var faq_a_h = jQuery(this).find(".faq_a .inner").outerHeight();
    var faq_open = gsap.timeline( {paused: true} );

    faq_open.to( jQuery(this).find(".faq_a"), {duration: .35, height:faq_a_h, transformOrigin: "100% 0%"})
     .to( jQuery(this).find(".faq_swipe"), {duration: .35, width:"0"});
    // faq_open.pause();

    jQuery(this).find(".slideOpen").hover(function() {

      faq.play();

    }, function() { faq.reverse(); } );

    jQuery(this).find('.slideOpen').click(function() {

      if(jQuery(this).attr('data-click-state') == 1) {
      jQuery(this).removeClass( "active" );
      faq_open.reverse();
      jQuery(this).attr('data-click-state', 0)
    } else {
      jQuery(this).attr('data-click-state', 1)
      jQuery(this).addClass( "active" );
      faq_open.play();
    }

    });

  });
  
  $(function() {
    var resizeEnd;
    $(window).on('resize', function() {
        clearTimeout(resizeEnd);
        resizeEnd = setTimeout(function() {
            $(window).trigger('resize-end');
        }, 200);
    });
});

$(window).on('resize-end', function() {
    resizeIt();
});

resizeIt();

function resizeIt() {
let winWidth = $(window).outerWidth();

//anything that needs to be resized goes in here

}; // end resizeIt

  // const wrapper = document.querySelector(".smallImgSlider.wrapper");
  const boxes = ".smallImgSlider .box";

  let activeElement;
  const loop = horizontalLoop(boxes, {
    paused: false,
    repeat: -1
  });

  //boxes tesimonials-slider
  const equaBoxes = "#tesimonials-slider .equaBoxSlider .equaBox";
  const equaLoop = horizontalLoop(equaBoxes, {
    paused: true
  });

  if ($("#tesimonials-slider .slideBtns").length) {
    // make the "next" and "previous" buttons call the appropriate methods on the timeline
    document.querySelector("#tesimonials-slider .slideBtns.slideNext").addEventListener("click", () => equaLoop.next({duration: 1, ease: "power1.inOut"}));
    document.querySelector("#tesimonials-slider .slideBtns.slidePrev").addEventListener("click", () => equaLoop.previous({duration: 1, ease: "power1.inOut"}));
  }

//video tesimonials-slider
  const videoBoxes = "#video-testimonials .videoTestimonial .videoBox";
  const videoLoop = horizontalLoop(videoBoxes, {
    paused: true
  });

  if ($("#video-testimonials .slideBtns").length) {
    // make the "next" and "previous" buttons call the appropriate methods on the timeline
    document.querySelector("#video-testimonials .slideBtns.slideNext").addEventListener("click", () => videoLoop.next({duration: 1, ease: "power1.inOut"}));
    document.querySelector("#video-testimonials .slideBtns.slidePrev").addEventListener("click", () => videoLoop.previous({duration: 1, ease: "power1.inOut"}));
  }

  // const wrapperEquaBox2 = document.querySelector(".smallImgSlider.wrapper");
  // const equaBoxes2 = "#service-spaces.equaBoxSlider .equaBox";

  // const equaLoop2 = horizontalLoop(equaBoxes2, {
  //   paused: true
  // });

  }); //end ready
}); //end jquery for wordpress
