/**
 * @package Techotronic
 * @subpackage jQuery Colorbox
 *
 * @since 3.2
 * @author Arne Franken
 * @author (Contributor) Fabian Wolf (http://usability-idealist.de/)
 * @author (Contributor) Jason Stapels (jstapels@realmprojects.com)
 *
 * Colorbox Javascript
 */
var COLORBOX_INTERNAL_LINK_PATTERN = /^#.*/;
var COLORBOX_SUFFIX_PATTERN = /\.(?:jpe?g|gif|png|bmp)/i;
var COLORBOX_MANUAL = "colorbox-manual";
var COLORBOX_OFF_CLASS = ".colorbox-off";
var COLORBOX_LINK_CLASS = ".colorbox-link";
var COLORBOX_OFF = "colorbox-off";
var COLORBOX_CLASS_PATTERN = "colorbox-[0-9]+";
var COLORBOX_LINK_CLASS_PATTERN = "colorbox-link-[0-9]+";

/**
 * This block calls all functions on page load.
 */
jQuery(document).ready(function() {

  emulateConsoleForIE();

  console.group('jQuery Colorbox log messages');
  //check if config JavaScript was successfully inserted. Load defaults otherwise.
  if(typeof jQueryColorboxSettingsArray !== 'object') {
    jQueryColorboxSettingsArray = getColorboxConfigDefaults();
  }

  if (jQueryColorboxSettingsArray.autoColorboxJavaScript === "true") {
    colorboxAddManualClass();
  }
  if (jQueryColorboxSettingsArray.colorboxAddClassToLinks === "true") {
    colorboxAddClassToLinks();
  }
  if (jQueryColorboxSettingsArray.autoHideFlash === "true") {
    colorboxHideFlash();
    colorboxShowFlash();
  }
  colorboxSelector();
  console.groupEnd();
});

/**
 * Make console.log do nothing in IE 9 and below, otherwise JavaScript would break
 *
 * @since 4.3
 * @author Arne Franken
 */
(function(jQuery) {
  emulateConsoleForIE = function() {

    if (!console) {
      console = {};
    }
    // union of Chrome, FF, IE, and Safari console methods
    var m = [
      "log", "info", "warn", "error", "debug", "trace", "dir", "group",
      "groupCollapsed", "groupEnd", "time", "timeEnd", "profile", "profileEnd",
      "dirxml", "assert", "count", "markTimeline", "timeStamp", "clear"
    ];
    // define undefined methods as noops to prevent errors
    for (var i = 0; i < m.length; i++) {
      if (!console[m[i]]) {
        console[m[i]] = function() {};
      }
    }

  }
})(jQuery);

/**
 * colorboxShowFlash
 *
 * show embedded flash objects when Colorbox closes
 */
(function(jQuery) {
  colorboxShowFlash = function() {
    jQuery(document).bind('cbox_closed', function() {
      console.group('Showing flash objects');
      var flashObjects = document.getElementsByTagName("object");
      for (var i = 0; i < flashObjects.length; i++) {
        console.debug('Show object %o',flashObjects[i]);
        flashObjects[i].style.visibility = "visible";
      }
      var flashEmbeds = document.getElementsByTagName("embed");
      for (var j = 0; j < flashEmbeds.length; j++) {
        console.debug('Show embed %o',flashEmbeds[j]);
        flashEmbeds[j].style.visibility = "visible";
      }
      console.groupEnd();
    });
  };
})(jQuery);

// colorboxShowFlash()

/**
 * colorboxHideFlash
 *
 * hide embedded flash objects when Colorbox opens
 */
(function(jQuery) {
  colorboxHideFlash = function() {
    jQuery(document).bind('cbox_open', function() {
      console.group('Hiding flash objects');
      var flashObjects = document.getElementsByTagName("object");
      for (var i = 0; i < flashObjects.length; i++) {
        console.debug('Hide object %o',flashObjects[i]);
        flashObjects[i].style.visibility = "hidden";
      }
      var flashEmbeds = document.getElementsByTagName("embed");
      for (var j = 0; j < flashEmbeds.length; j++) {
        console.debug('Hide embed %o',flashEmbeds[j]);
        flashEmbeds[j].style.visibility = "hidden";
      }
      console.groupEnd();
    });
  };
})(jQuery);

// colorboxHideFlash()

/**
 * colorboxAddClassToLinks
 *
 * add colorbox-link to anchor tags
 */
(function(jQuery) {
  colorboxAddClassToLinks = function() {
    console.group('Add colorbox-link class to links pointing to images');
    jQuery("a:not(:contains(img))").each(function(index, link) {
      var $link = jQuery(link);
      var $linkClass = $link.attr("class");
      if ($linkClass !== undefined && !$linkClass.match('colorbox')) {
        var $linkHref = $link.attr("href");
        if ($linkHref !== undefined && jQuery(link).attr("href").match(COLORBOX_SUFFIX_PATTERN)) {
          console.debug("Add colorbox-link class to %o.",$link);
          $link.addClass('colorbox-link');
        }
      }
    });
    console.groupEnd();
  };
})(jQuery);

// colorboxAddClassToLinks()

/**
 * colorboxAddManualClass
 *
 * add colorbox-manual to ALL img tags
 */
(function(jQuery) {
  colorboxAddManualClass = function() {
    console.group('Add colorbox-manual class to images');
    jQuery("img").each(function(index, image) {
      var $img = jQuery(image);
      var $imgClass = $img.attr("class");
      if ($imgClass === undefined || !$imgClass.match('colorbox')) {
        console.debug('Add colorbox-manual class to image %o',$img);
        $img.addClass('colorbox-manual');
      }
    });
    console.groupEnd();
  };
})(jQuery);

// colorboxAddManualClass()

/**
 * colorboxSelector
 *
 * call colorboxImage on all "a" elements that have a nested "img"
 */
(function(jQuery) {
  colorboxSelector = function() {
    console.group('Find image links and apply colorbox effect.');
    jQuery("a:has(img[class*=colorbox-]):not(.colorbox-off)").each(function(index, link) {
      console.group("Found link %o.",link);
      //create local copy of Colorbox array so that modifications can be made for every link
      ColorboxLocal = jQuery.extend(true,{},jQueryColorboxSettingsArray);

      //set variables for images
      ColorboxLocal.colorboxMaxWidth = ColorboxLocal.colorboxImageMaxWidth;
      ColorboxLocal.colorboxMaxHeight = ColorboxLocal.colorboxImageMaxHeight;
      ColorboxLocal.colorboxHeight = ColorboxLocal.colorboxImageHeight;
      ColorboxLocal.colorboxWidth = ColorboxLocal.colorboxImageWidth;
      var $linkHref = jQuery(link).attr("href");
      if ($linkHref !== undefined && $linkHref.match(COLORBOX_SUFFIX_PATTERN)) {
        colorboxImage(index, link);
      }
      //else {
        //TODO: does not work, every link from an image will be opened in a colorbox...
        //colorboxLink(index, link,$linkHref)
      //}
      console.groupEnd();
    });
    console.groupEnd();

    console.group('Find links and apply colorbox effect.');
    jQuery("a[class*=colorbox-link]").each(function(index, link) {
      console.group("Found link %o.",link);
      //create local copy of Colorbox array so that modifications can be made for every link
      ColorboxLocal = jQuery.extend(true,{},jQueryColorboxSettingsArray);

      var $linkHref = jQuery(link).attr("href");
      if ($linkHref !== undefined) {
        colorboxLink(index, link,$linkHref);
      }
      console.groupEnd();
    });
    console.groupEnd();
  };
})(jQuery);

// colorboxSelector()

/**
 * colorboxImage
 *
 * selects only links that point to images and sets necessary variables
 */
(function(jQuery) {
  colorboxImage = function(index, link) {
    var $image = jQuery(link).find("img:first");
    //check if the link has a colorbox class
    var $linkClasses = jQuery(link).attr("class");
    if ($linkClasses !== undefined) {
      ColorboxLocal.colorboxGroupId = $linkClasses.match(COLORBOX_CLASS_PATTERN) || $linkClasses.match(COLORBOX_MANUAL);
    }
    if (!ColorboxLocal.colorboxGroupId) {
      // link does not have colorbox class. Check if image has colorbox class.
      var $imageClasses = $image.attr("class");
      if ($imageClasses !== undefined && !$imageClasses.match(COLORBOX_OFF)) {
        //groupId is either the automatically created colorbox-123 or the manually added colorbox-manual
        ColorboxLocal.colorboxGroupId = $imageClasses.match(COLORBOX_CLASS_PATTERN) || $imageClasses.match(COLORBOX_MANUAL);
      }
      //only call Colorbox if there is a groupId for the image
      if (ColorboxLocal.colorboxGroupId) {
        //convert groupId to string and lose "colorbox-" for easier use
        ColorboxLocal.colorboxGroupId = ColorboxLocal.colorboxGroupId.toString().split('-')[1];

        //if groudId is colorbox-manual, set groupId to "nofollow" so that images are not grouped
        if (ColorboxLocal.colorboxGroupId === "manual") {
          ColorboxLocal.colorboxGroupId = "nofollow";
        }
        //the title of the img is used as the title for the Colorbox.
        var $imageTitle = $image.attr("title");
        if ($imageTitle !== undefined) {
          ColorboxLocal.colorboxTitle = $imageTitle;
        }
        else {
          //try to use the alt of the img as the title for the Colorbox.
          var $imageAlt = $image.attr("alt");
          if ($imageAlt !== undefined) {
            ColorboxLocal.colorboxTitle = $imageAlt;
          }
        }

        if (jQueryColorboxSettingsArray.addZoomOverlay === "true") {
          colorboxAddZoomOverlayToImages(jQuery(link), $image);
        }
        console.debug("Call colorbox for image %o.",$image);
        colorboxWrapper(link);
      }
    }
  };
})(jQuery);

// colorboxImage()

/**
 * colorboxLink
 *
 * sets necessary variables
 */
(function(jQuery) {
  colorboxLink = function(index, link, linkHref) {

    //class attribute must exist, otherwise this method wouldn't be called
    ColorboxLocal.colorboxGroupId = jQuery(link).attr("class").match(COLORBOX_LINK_CLASS_PATTERN);

    if(ColorboxLocal.colorboxGroupId !== undefined && ColorboxLocal.colorboxGroupId !== null) {
      //convert groupId to string and lose "colorbox-link-" for easier use
      ColorboxLocal.colorboxGroupId = ColorboxLocal.colorboxGroupId.toString().split('-')[2];
    }
    else {
      //no matching class found for link, Colorbox links should not be grouped
      ColorboxLocal.colorboxGroupId = "nofollow";
    }

    var $link = jQuery(link);
    //the title of the link is used as the title for the Colorbox
    var $linkTitle = $link.attr("title");
    if ($linkTitle !== undefined) {
      ColorboxLocal.colorboxTitle = $linkTitle;
    }
    else {
      ColorboxLocal.colorboxTitle = '';
    }

    // already checked for ($linkHref !== undefined) before calling this method
    if (linkHref.match(COLORBOX_SUFFIX_PATTERN)) {
      //link points to an image, set variables accordingly
      ColorboxLocal.colorboxMaxWidth = ColorboxLocal.colorboxImageMaxWidth;
      ColorboxLocal.colorboxMaxHeight = ColorboxLocal.colorboxImageMaxHeight;
      ColorboxLocal.colorboxHeight = ColorboxLocal.colorboxImageHeight;
      ColorboxLocal.colorboxWidth = ColorboxLocal.colorboxImageWidth;
    }
    else {
      //link points to something else, set variables accordingly
      ColorboxLocal.colorboxMaxWidth = false;
      ColorboxLocal.colorboxMaxHeight = false;
      ColorboxLocal.colorboxHeight = ColorboxLocal.colorboxLinkHeight;
      ColorboxLocal.colorboxWidth = ColorboxLocal.colorboxLinkWidth;

      if (linkHref.match(COLORBOX_INTERNAL_LINK_PATTERN)) {
        //link points to inline content
        ColorboxLocal.colorboxInline = true;
      }
      else {
        //link points to something else, load in iFrame
        ColorboxLocal.colorboxIframe = true;
      }
    }
    console.debug("Call colorbox for link %o.",link);
    colorboxWrapper(link);
  };
})(jQuery);

// colorboxLink()

/**
 * colorboxWrapper
 *
 * actually calls the colorbox function on the links
 * elements with the same groupId in the class attribute are grouped
 */
(function(jQuery) {
  colorboxWrapper = function(link) {
    //workaround for wp_localize_script behavior:
    //the function puts booleans as strings into the "ColorboxLocal" array...
    jQuery.each(ColorboxLocal, function(key, value) {
      if (value === "false") {
        ColorboxLocal[key] = false;
      }
      else if (value === "true") {
        ColorboxLocal[key] = true;
      }
    });

    console.debug("Apply colorbox to link %o with values %o",link,ColorboxLocal);

    //finally call Colorbox library
    jQuery(link).colorbox({
      // --- settings
      transition:ColorboxLocal.colorboxTransition,
      speed:parseInt(ColorboxLocal.colorboxSpeed),
      //href=false
      title:ColorboxLocal.colorboxTitle,
      rel:ColorboxLocal.colorboxGroupId,
      scalePhotos:ColorboxLocal.colorboxScalePhotos,
      scrolling:ColorboxLocal.colorboxScrolling,
      opacity:ColorboxLocal.colorboxOpacity,
      //open=false
      //returnFocus=true
      //fastIframe=true
      preloading:ColorboxLocal.colorboxPreloading,
      overlayClose:ColorboxLocal.colorboxOverlayClose,
      escKey:ColorboxLocal.colorboxEscKey,
      arrowKey:ColorboxLocal.colorboxArrowKey,
      loop:ColorboxLocal.colorboxLoop,
      //data

      //--- Internationalization
      current:ColorboxLocal.colorboxCurrent,
      previous:ColorboxLocal.colorboxPrevious,
      next:ColorboxLocal.colorboxNext,
      close:ColorboxLocal.colorboxClose,
      xhrError:ColorboxLocal.colorboxXhrError,
      imgError:ColorboxLocal.colorboxImgError,

      // --- content type
      iframe:ColorboxLocal.colorboxIframe,
      inline:ColorboxLocal.colorboxInline,
      //html
      //photo
      //ajax

      // --- dimensions
      width:ColorboxLocal.colorboxWidth,
      height:ColorboxLocal.colorboxHeight,
      //innerWidth=false
      //innerHeight=false
      initialWidth:ColorboxLocal.colorboxInitialWidth,
      initialHeight:ColorboxLocal.colorboxInitialHeight,
      maxWidth:ColorboxLocal.colorboxMaxWidth,
      maxHeight:ColorboxLocal.colorboxMaxHeight,

      // --- slideshow
      slideshow:ColorboxLocal.colorboxSlideshow,
      slideshowSpeed:parseInt(ColorboxLocal.colorboxSlideshowSpeed),
      slideshowAuto:ColorboxLocal.colorboxSlideshowAuto,
      slideshowStart:ColorboxLocal.colorboxSlideshowStart,
      slideshowStop:ColorboxLocal.colorboxSlideshowStop

      // --- positioning
      //fixed:false
      //top:false
      //bottom:false
      //left: false
      //right:false


      // --- callbacks
      //onOpen
      //onLoad
      //onComplete
      //onCleanup
      //onClosed
    });
  };
})(jQuery);

// colorboxWrapper()

/**
 * Add zoom classes and effects to links and images.
 */
(function (jQuery) {
  colorboxAddZoomOverlayToImages = function ($link, $image) {
    console.debug("Add zoom hover to link %o",$link);
    var $zoomHover = jQuery('<span class="zoomHover" style="opacity: 0; margin: 0; padding: 0;"></span>');

    //add float from image to link, otherwise the zoom overlay would not be visible
    $link.css("float",$image.css("float"));

    $link.append($zoomHover);
    $link.addClass("zoomLink");

    $link.hover(
        function () {
          //mouseIn, show zoom overlay
          $zoomHover.stop().animate({opacity:0.8}, 300);
          $image.stop().animate({opacity:0.6}, 300);
        },
        function () {
          //mouseOut, hide zoom overlay
          $zoomHover.stop().animate({ opacity:0 }, 300);
          $image.stop().animate({ opacity:1 }, 300);
        });
  };
})(jQuery);

// colorboxAddZoomOverlayToImages()


/**
 * colorboxConfigDefaults
 *
 * default values for colorbox configuration in case the configuration array was not added successfully to the HTML.
 */
(function(jQuery) {
  getColorboxConfigDefaults = function() {
    return {
      colorboxInline: false,
      colorboxIframe: false,
      colorboxGroupId: '',
      colorboxTitle: '',
      colorboxWidth: false,
      colorboxHeight: false,
      colorboxMaxWidth: false,
      colorboxMaxHeight: false,
      colorboxSlideshow: false,
      colorboxSlideshowAuto: false,
      colorboxScalePhotos: false,
      colorboxPreloading: false,
      colorboxOverlayClose: false,
      colorboxLoop: false,
      colorboxEscKey: true,
      colorboxArrowKey:true,
      colorboxScrolling:false,
      colorboxOpacity:'0.85',
      colorboxTransition:'elastic',
      colorboxSpeed:'350',
      colorboxSlideshowSpeed:'2500',
      colorboxClose: 'close',
      colorboxNext:'next',
      colorboxPrevious:'previous',
      colorboxSlideshowStart:'start slideshow',
      colorboxSlideshowStop:'stop slideshow',
      colorboxCurrent:'{current} of {total} images',
      colorboxXhrError:'This content failed to load.',
      colorboxImgError:'This image failed to load.',

      colorboxImageMaxWidth: false,
      colorboxImageMaxHeight: false,
      colorboxImageHeight: false,
      colorboxImageWidth:false,

      colorboxLinkHeight: false,
      colorboxLinkWidth: false,

      colorboxInitialHeight: 100,
      colorboxInitialWidth: 300,
      autoColorboxJavaScript: false,
      autoHideFlash: false,
      autoColorbox: false,
      autoColorboxGalleries: false,
      colorboxAddClassToLinks: false,
      useGoogleJQuery: false,
      addZoomOverlay: false
    };
  };
})(jQuery);

// getColorboxConfigDefaults()
