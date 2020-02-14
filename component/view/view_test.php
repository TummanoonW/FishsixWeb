<?php
    class ViewTest{ ////profile HTML elements loader

        public static function initView($dir, $sess, $paths){
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo App::$name ?></title>

    <!-- Prevent the demo from appearing in search engines (REMOVE THIS) -->
    <meta name="robots" content="noindex">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">
  
    <!-- Progressive Web App -->
    <meta name="theme-color" content="#121212">
    <link rel="manifest" href="manifest.json">
  
    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">

    <link rel="icon" href="<?php Asset::embedIcon($dir, 'cropped-logo-fishsix-32x32.png') ?>" sizes="32x32">
    <link rel="icon" href="<?php Asset::embedIcon($dir, 'cropped-logo-fishsix-192x192.png') ?>" sizes="192x192">
    <link rel="apple-touch-icon-precomposed" href="<?php Asset::embedIcon($dir, 'cropped-logo-fishsix-180x180.png') ?>">
  
    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="A zUIx website">
    <link rel="mask-icon" href="images/icons/desktop/safari-pinned-tab.svg" color="#5bbad5">
  
    <!-- Tile color for Windows -->
    <meta name="msapplication-TileImage" content="images/icons/desktop/mstile-150x150.png">
    <meta name="msapplication-TileColor" content="#ffc40d">
  
    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->
  
    <!-- Material Design Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  
    <!-- import zUIx library (v 0.4.9-54) -->
    <?php Script::customScript($dir, 'netflix/zuix.min.js') ?>
    <?php Script::customScript($dir, 'netflix/app.bundle.js') ?>
    <?php Script::customScript($dir, 'netflix/index.js') ?>
  
  <script type="text/javascript" id="script-605580544">undefined</script><style type="text/css" id="style--1101994688">/**
   * Flex layout attribute
   * HTML layout helper based on CSS flexbox specification.
   * 
   * VERSION: v1.0.3
   * DATE:    2016-06-21
   * URL:     http://progressivered.com/fla/
   * AUTHOR:  Stefan Kovac | stef@progressivered.com | http://progressivered.com/
   * LICENSE: MIT 
   */
   
  html{box-sizing:border-box}*,:after,:before{box-sizing:inherit}[layout]{display:-ms-flexbox;display:flex}[layout*=column],[layout*=row]{width:100%;max-width:100%}[layout^=row]{-ms-flex-direction:row;flex-direction:row}[layout^=column]{-ms-flex-direction:column;flex-direction:column}[layout*=row][layout*=reverse]{-ms-flex-direction:row-reverse;flex-direction:row-reverse}[layout*=column][layout*=reverse]{-ms-flex-direction:column-reverse;flex-direction:column-reverse}[layout*=columns],[layout*=rows]{-ms-flex-wrap:wrap;flex-wrap:wrap}[layout=none]{-ms-flex:none;flex:none}[layout*=column][layout*=top-],[layout*=row][layout*=-left]{-ms-flex-pack:start;justify-content:flex-start}[layout*=column][layout*=center-],[layout*=row][layout*=-center],[layout~=centered]{-ms-flex-pack:center;justify-content:center}[layout*=column][layout*=bottom-],[layout*=row][layout*=-right]{-ms-flex-pack:end;justify-content:flex-end}[layout*=column][layout*=spread-],[layout*=row][layout*=-spread]{-ms-flex-pack:distribute;justify-content:space-around}[layout*=column][layout*=justify-],[layout*=row][layout*=-justify]{-ms-flex-pack:justify;justify-content:space-between}[layout*=column][layout*=-left],[layout*=row][layout*=top-]{-ms-flex-align:start;-ms-grid-row-align:flex-start;align-items:flex-start}[layout*=column][layout*=-center],[layout*=row][layout*=center-],[layout~=centered]{-ms-flex-align:center;-ms-grid-row-align:center;align-items:center}[layout*=column][layout*=-right],[layout*=row][layout*=bottom-]{-ms-flex-align:end;-ms-grid-row-align:flex-end;align-items:flex-end}[layout*=column][layout*=-stretch],[layout*=row][layout*=stretch-]{-ms-flex-align:stretch;-ms-grid-row-align:stretch;align-items:stretch}[layout*=columns][layout*=-left],[layout*=rows][layout*=top-]{-ms-flex-line-pack:start;align-content:flex-start}[layout*=columns][layout*=-right],[layout*=rows][layout*=bottom-]{-ms-flex-line-pack:end;align-content:flex-end}[layout*=columns][layout*=-center],[layout*=rows][layout*=center-]{-ms-flex-line-pack:center;align-content:center}[layout*=columns][layout*=-justify],[layout*=rows][layout*=justify-]{-ms-flex-line-pack:justify;align-content:space-between}[layout*=columns][layout*=-spread],[layout*=rows][layout*=spread-]{-ms-flex-line-pack:distribute;align-content:space-around}[layout*=columns][layout*=-stretch],[layout*=rows][layout*=stretch-]{-ms-flex-line-pack:stretch;align-content:stretch}@media (-ms-high-contrast:none),screen and (-ms-high-contrast:active){[layout*=column]:not([layout*=row])>*{max-width:auto}[layout*=column][self*=top]{height:auto!important}[self~=size-]>*{height:auto}}[layout*=column]:not([layout*=row]) [self*=left],[layout*=row]:not([layout*=column]) [self*=top]{-ms-flex-item-align:start;align-self:flex-start}[self~=center]{-ms-flex-item-align:center;align-self:center}[layout*=column]:not([layout*=row]) [self*=right],[layout*=row]:not([layout*=column]) [self*=bottom]{-ms-flex-item-align:end;align-self:flex-end}[self*=stretch]{-ms-flex-item-align:stretch;align-self:stretch}[layout][self*=center]{margin-left:auto;margin-right:auto}[layout][self*=right]{margin-right:0}[layout][self*=left]{margin-left:0}[layout*=column] [self*=bottom]{margin-top:auto}[layout*=column] [self*=top]{margin-bottom:auto}[layout*=row] [self*=left]{margin-right:auto}[layout*=row] [self*=right]{margin-left:auto}[self~=size-1of5]{width:20%}[self~=size-1of4]{width:25%}[self~=size-1of3]{width:33.33333%}[self~=size-2of5]{width:40%}[self~=size-1of2]{width:50%}[self~=size-3of5]{width:60%}[self~=size-2of3]{width:66.6666%}[self~=size-3of4]{width:75%}[self~=size-4of5]{width:80%}[self~=size-1of1]{width:100%}[layout*=column][layout*=stretch-]>:not([self*=size-]),[layout*=row][layout*=-stretch]>:not([self*=size-]),[self~=size-x1]{-ms-flex:1 0 0%!important;flex:1 0 0%!important}[self~=size-x2]{-ms-flex:2 0 0%!important;flex:2 0 0%!important}[self~=size-x3]{-ms-flex:3 0 0%!important;flex:3 0 0%!important}[self~=size-x4]{-ms-flex:4 0 0%!important;flex:4 0 0%!important}[self~=size-x5]{-ms-flex:5 0 0%!important;flex:5 0 0%!important}[self~=size-x6]{-ms-flex:6 0 0%!important;flex:6 0 0%!important}[self~=size-x7]{-ms-flex:7 0 0%!important;flex:7 0 0%!important}[self~=size-x8]{-ms-flex:8 0 0%!important;flex:8 0 0%!important}[self~=size-x9]{-ms-flex:9 0 0%!important;flex:9 0 0%!important}[self*=size-auto]{-ms-flex:1 1 auto;flex:1 1 auto}[self*=size-x0]{-ms-flex:0 0 auto;flex:0 0 auto}[self~=size-xxlarge]{max-width:1440px;width:100%}[self~=size-xlarge]{max-width:1200px;width:100%}[self~=size-large]{max-width:960px;width:100%}[self~=size-larger]{max-width:840px;width:100%}[self~=size-medium]{max-width:720px;width:100%}[self~=size-smaller]{max-width:600px;width:100%}[self~=size-small]{max-width:480px;width:100%}[self~=size-xsmall]{max-width:360px;width:100%}[self~=size-xxsmall]{max-width:240px;width:100%}[self*=size-x]:not([self*=small]):not([self*=large]){-ms-flex-negative:1;flex-shrink:1}[self~=first]{-ms-flex-order:-1;order:-1}[self~=order-1]{-ms-flex-order:1;order:1}[self~=order-2]{-ms-flex-order:2;order:2}[self~=order-3]{-ms-flex-order:3;order:3}[self~=last]{-ms-flex-order:999;order:999}[layout*=column]:not([layout*=row])>*{-ms-flex-negative:0;flex-shrink:0;-ms-flex-preferred-size:auto;flex-basis:auto}@media screen and (max-width:64em){[layout*=lg-row]{-ms-flex-direction:row;flex-direction:row}[layout*=lg-column]{-ms-flex-direction:column;flex-direction:column}[layout*=lg-columns],[layout*=lg-rows]{-ms-flex-wrap:wrap;flex-wrap:wrap}}@media screen and (max-width:52em){[layout*=md-row]{-ms-flex-direction:row;flex-direction:row}[layout*=md-column]{-ms-flex-direction:column;flex-direction:column}[layout*=md-columns],[layout*=md-rows]{-ms-flex-wrap:wrap;flex-wrap:wrap}}@media screen and (max-width:40em){[layout*=sm-row]{-ms-flex-direction:row;flex-direction:row}[layout*=sm-column]{-ms-flex-direction:column;flex-direction:column}[layout*=sm-columns],[layout*=sm-rows]{-ms-flex-wrap:wrap;flex-wrap:wrap}}@media screen and (max-width:64em){[self*=lg-full]{-ms-flex:1 1 100%!important;flex:1 1 100%!important;width:100%;max-width:100%}[self*=lg-half]{-ms-flex:1 1 50%!important;flex:1 1 50%!important;width:50%;max-width:50%}[self~=lg-first]{-ms-flex-order:-1;order:-1}[self~=lg-last]{-ms-flex-order:999;order:999}[self~=lg-hide]{display:none}[self~=lg-show]{display:inherit}}@media screen and (max-width:52em){[self*=md-full]{-ms-flex:1 1 100%!important;flex:1 1 100%!important;width:100%;max-width:100%}[self*=md-half]{-ms-flex:1 1 50%!important;flex:1 1 50%!important;width:50%;max-width:50%}[self~=md-first]{-ms-flex-order:-1;order:-1}[self~=md-last]{-ms-flex-order:999;order:999}[self~=md-hide]{display:none}[self~=md-show]{display:inherit}}@media screen and (max-width:40em){[self*=sm-full]{-ms-flex:1 1 100%!important;flex:1 1 100%!important;width:100%;max-width:100%}[self*=sm-half]{-ms-flex:1 1 50%!important;flex:1 1 50%!important;width:50%;max-width:50%}[self~=sm-first]{-ms-flex-order:-1;order:-1}[self~=sm-last]{-ms-flex-order:999;order:999}[self~=sm-hide]{display:none}[self~=sm-show]{display:inherit}}</style><style type="text/css" id="style-1784725062">/* CSS files add styling rules to your content */
  
  body {
      font-family: "Trebuchet MS", Helvetica, sans-serif;
      font-size: 16px;
      margin: 0; padding: 0;
      background: #1a1a1a;
      -webkit-user-select:none;
      -moz-user-select:none;
      -ms-user-select:none;
      user-select:none;
      --overscroll-behavior-y: contain;
  }
  
  button:hover, a:hover {
      cursor: pointer;
      opacity: 0.8;
  }
  
  a {
      -webkit-user-select: none;
      -khtml-user-select: none;
      -moz-user-select: none;
      -o-user-select: none;
      user-select: none;
  }
  
  a, a:visited, a:hover {
      color: darkorange;
      text-decoration: none;
  }
  
  .noscroll {
      overflow: hidden;
  }
  </style><style type="text/css" id="layout/header">
  [data-ui-component="layout/header"]:not(.zuix-css-ignore) {
    position: fixed;
    top:0;
    left:0;
    right:0;
    height:auto;
    z-index: 100;
  }
  
  [data-ui-component="layout/header"]:not(.zuix-css-ignore)
  .header  {
    height: 56px;
    max-height: 56px;
  }
  
  [data-ui-component="layout/header"]:not(.zuix-css-ignore)
  .logo  {
    padding-left: 12px;
    padding-right: 12px;
    font-size: 220%;
    font-weight: 500;
    color: #dd3532;
    text-shadow:
            1px 1px 0 #600,
            -1px -1px 0 #600,
            1px -1px 0 #600,
            -1px 1px 0 #600,
            1px 1px 0 #600;
  }
  </style><style type="text/css" id="layout/footer">
  [data-ui-component="layout/footer"]:not(.zuix-css-ignore) {
      position: fixed;
      left:0; bottom:0; right: 0;
      height: 56px;
      background: #121212;
      color: white;
      border-top: solid 1px #711615;
      text-align: center;
      z-index: 100;
      overflow: hidden;
  }
  
  [data-ui-component="layout/footer"]:not(.zuix-css-ignore)
  button  {
      padding: 12px;
      max-height: 56px;
      margin-left: 8px;
      margin-right: 8px;
      background: transparent;
      border: none;
      border-radius: 8px;
      color: rgba(0,0,0,0.5);
      -webkit-transition: all .3s; 
      transition: all .3s;
  }
  
  [data-ui-component="layout/footer"]:not(.zuix-css-ignore)
  button:hover  {
      background: rgba(255,255,255,0.25);
  }
  
  [data-ui-component="layout/footer"]:not(.zuix-css-ignore)
  button:focus  {outline:0;}
  
  [data-ui-component="layout/footer"]:not(.zuix-css-ignore)
  button i  {
      color: #7c7c7c;
      font-size: 32px !important;
  }
  
  [data-ui-component="layout/footer"]:not(.zuix-css-ignore)
  button:hover i , 
  [data-ui-component="layout/footer"]:not(.zuix-css-ignore)
   .active i  {
      color: white;
  }
  
  [data-ui-component="layout/footer"]:not(.zuix-css-ignore)
  .active  {
      transform: scale(1.2);
      text-shadow:
              1px 1px 0 #000,
              -1px -1px 0 #000,
              1px -1px 0 #000,
              -1px 1px 0 #000,
              1px 1px 0 #000;
  }
  </style><style type="text/css" id="pages/home">
  [data-ui-component="pages/home"]:not(.zuix-css-ignore) {
      
      
      color: white;
      padding-bottom: 96px;
      overflow-x: hidden;
  }
  
  [data-ui-component="pages/home"]:not(.zuix-css-ignore)
  h1  {
      font-size: 120%;
      text-align: left;
      margin-top: 28px;
      margin-left: 8px;
      margin-bottom: 8px;
  }
  
  [data-ui-component="pages/home"]:not(.zuix-css-ignore)
  .content  {
      position: absolute;
      top: 0; left: 0;
      padding-bottom: 56px;
      width: 100vw;
      height: 90vh;
      background-image: linear-gradient(to bottom, rgba(0,0,0, 0.15), transparent 20%, transparent 70%, rgba(0,0,0, 0.5) 80%);
  }
  
  [data-ui-component="pages/home"]:not(.zuix-css-ignore)
  .categories , 
  [data-ui-component="pages/home"]:not(.zuix-css-ignore)
   .options  {
      padding: 8px;
  }
  
  [data-ui-component="pages/home"]:not(.zuix-css-ignore)
  button  {
      padding-left: 6px;
      padding-right: 16px;
      font-size: 120%;
      font-weight: 500;
      min-height: 38px;
  }
  
  [data-ui-component="pages/home"]:not(.zuix-css-ignore)
  button div i  {
      margin-right: 6px;
  }
  
  [data-ui-component="pages/home"]:not(.zuix-css-ignore)
  button.flat-btn  {
      border: 0;
      background: transparent;
      height: 56px;
      width: 56px;
      padding: 0;
      text-align: center;
      vertical-align: middle;
  }
  
  [data-ui-component="pages/home"]:not(.zuix-css-ignore)
  button.flat-btn i  {
      color: white;
      font-size: 36px;
      line-height: 56px;
  }
  
  [data-ui-component="pages/home"]:not(.zuix-css-ignore)
  .gallery  {
      width: 100%;
      height: 180px;
  }
  
  [data-ui-component="pages/home"]:not(.zuix-css-ignore)
  .movie  {
      padding: 4px;
  }
  
  [data-ui-component="pages/home"]:not(.zuix-css-ignore)
  .movie span.item  {
      display: inline-block;
      width: 120px;
      height: 180px;
      border: solid 1px rgba(255,255,255,.1);
      background-image: linear-gradient(rgba(0,0,0,0.15) 0, transparent 48px, transparent 40%, black 99%);
  }
  
  [data-ui-component="pages/home"]:not(.zuix-css-ignore)
  .movie span.item:hover  {
      cursor: pointer;
      opacity: 0.8;
  }
  
  [data-ui-component="pages/home"]:not(.zuix-css-ignore)
  .about-box  {
      margin-top: 56px;
      margin-bottom: 48px;
      font-size: 140%;
      font-family: "Benton Sans", "Helvetica Neue", helvetica, arial, sans-serif;
      line-height: 160%;
  }
  
  [data-ui-component="pages/home"]:not(.zuix-css-ignore)
  .about-box p  {
      padding: 12px;
  }
  @media only screen and (min-device-width : 720px)  {
    
  [data-ui-component="pages/home"]:not(.zuix-css-ignore)
      .gallery  {
          height: 231px;
      }
  
  [data-ui-component="pages/home"]:not(.zuix-css-ignore)
      .movie span.item  {
          width: 154px;
          height: 231px;
      }
  
  }</style><style type="text/css" id="pages/search">
  [data-ui-component="pages/search"]:not(.zuix-css-ignore) {
      color: white;
      padding: 24px;
  }
  
  [data-ui-component="pages/search"]:not(.zuix-css-ignore)
  .message  {
      color: darkgrey;
      min-height: 100vh;
      width: 100vw;
      font-size: 200%;
  }
  
  [data-ui-component="pages/search"]:not(.zuix-css-ignore)
  .message i  {
      margin-left: 16px;
      color: darkgrey;
      font-size: 150%;
  }
  </style><style type="text/css" id="pages/notifications">
  [data-ui-component="pages/notifications"]:not(.zuix-css-ignore) {
      color: white;
  }
  
  [data-ui-component="pages/notifications"]:not(.zuix-css-ignore)
  .message  {
      color: darkgrey;
      min-height: 100vh;
      width: 100vw;
      font-size: 200%;
  }
  
  [data-ui-component="pages/notifications"]:not(.zuix-css-ignore)
  .message i  {
      margin-left: 16px;
      color: darkgrey;
      font-size: 150%;
  }
  </style><style type="text/css" id="pages/about">
  [data-ui-component="pages/about"]:not(.zuix-css-ignore) {
      color: white;
      padding: 24px;
      margin-top: 64px;
      margin-bottom: 64px;
  }
  
  [data-ui-component="pages/about"]:not(.zuix-css-ignore)
  h1  {
      color: darkgrey;
  }
  </style><style type="text/css" id="pages/home/main_cover">
  [data-ui-component="pages/home/main_cover"]:not(.zuix-css-ignore)
  .cover-wrapper  {
      overflow: hidden;
      margin-left: auto;
      margin-right: auto;
      height: 90vh;
      background-image: linear-gradient(to bottom, rgba(0,0,0, 0.3), transparent 20%, transparent 80%, rgba(0,0,0, 0.3) 90%);
  }
  
  [data-ui-component="pages/home/main_cover"]:not(.zuix-css-ignore)
  .cover  {
      height: 90vh;
      background-size: cover;
      background-repeat: no-repeat;
      background-position-x: center;
      
  }
  </style><style type="text/css" id="pages/home/title_details">
  [data-ui-component="pages/home/title_details"]:not(.zuix-css-ignore) {
      position: fixed;
      z-index: 200;
      top: 0; left: 100vh;
      transition: left .2s ease-in-out;
      touch-action: none;
      width: 100vw;
      min-height: 100vh;
      background: #101010;
      color: white;
  }
  
  [data-ui-component="pages/home/title_details"]:not(.zuix-css-ignore)
  header  {
      position: fixed;
      top: 0; left: 0; right: 0; height: 56px;
      z-index: 200;
  }
  
  [data-ui-component="pages/home/title_details"]:not(.zuix-css-ignore)
  header button  {
      position: absolute;
      top: 0; left: 0;
      z-index: 10;
      border: 0;
      background: transparent;
      width: 56px;
      height: 56px;
      padding: 0;
      text-align: center;
      vertical-align: middle;
  }
  
  [data-ui-component="pages/home/title_details"]:not(.zuix-css-ignore)
  header button i  {
      color: white;
      font-weight: 700;
      font-size: 160%;
      line-height: 48px;
  }
  
  [data-ui-component="pages/home/title_details"]:not(.zuix-css-ignore)
  header h1  {
      position: absolute;
      top: 14px;
      left: 56px;
      margin: 0;
      font-size: 160%;
  }
  
  [data-ui-component="pages/home/title_details"]:not(.zuix-css-ignore)
  main  {
      position: absolute;
      top:0;left:0; bottom: 0;
      width: 100%;
      padding-bottom: 72px;
      overflow-y: auto;
  }
  
  [data-ui-component="pages/home/title_details"]:not(.zuix-css-ignore)
  footer  {
      position: fixed;
      bottom: 0; left: 0; right: 0; height: 56px;
      background: #0a0a0a;
      border-top: solid 1px rgba(255,0,0,0.5);
  }
  
  [data-ui-component="pages/home/title_details"]:not(.zuix-css-ignore)
  .cover  {
      background: black no-repeat;
      background-size: cover;
      background-position-x: center;
      position: relative;
      width: 100vw;
      height: 50vh;
  }
  
  [data-ui-component="pages/home/title_details"]:not(.zuix-css-ignore)
  .cover .background  {
      position: absolute;
      left: 0; right: 0; top: 0; bottom: 0;
      background-image: linear-gradient(to bottom, rgba(0,0,0, 0.35) 1%, transparent 20%, transparent 80%, rgba(0,0,0, 0.35) 90%);
  }
  
  [data-ui-component="pages/home/title_details"]:not(.zuix-css-ignore)
  .cover h1  {
      z-index: 10;
      margin: 0;
      padding: 16px;
      font-size: 180%;
      text-shadow:
              1px 1px 0 #000,
              -1px -1px 0 #000,
              1px -1px 0 #000,
              -1px 1px 0 #000,
              1px 1px 0 #000;
  }
  
  [data-ui-component="pages/home/title_details"]:not(.zuix-css-ignore)
  [data-ui-field="overview"]  {
      font-size: 120%;
      line-height: 160%;
      padding: 16px;
      margin-top: 8px;
      margin-bottom: 0;
      color: whitesmoke;
  }
  
  [data-ui-component="pages/home/title_details"]:not(.zuix-css-ignore)
  h2  {
      color: darkgrey;
  }
  
  [data-ui-component="pages/home/title_details"]:not(.zuix-css-ignore)
  [data-ui-field="vote"]  {
      color: white;
  }
  @media only screen and (min-device-width : 720px)  {
    
  [data-ui-component="pages/home/title_details"]:not(.zuix-css-ignore)
      [data-ui-field="overview"]  {
          font-size: 140%;
          line-height: 180%;
      }
  
  [data-ui-component="pages/home/title_details"]:not(.zuix-css-ignore)
      .cover h1  {
          font-size: 220%;
      }
  
  }</style>
<!-- Font Awesome Icons -->
<link type="text/css" href="<?php Nav::echoURL($dir, 'assets/css/fontawesome.css') ?>" rel="stylesheet">
                <link type="text/css" href="<?php Nav::echoURL($dir, 'assets/css/fontawesome.rtl.css') ?>" rel="stylesheet">

                <!-- App CSS -->
                <link type="text/css" href="<?php Nav::echoURL($dir, 'assets/css/app.css') ?>" rel="stylesheet">
                <link type="text/css" href="<?php Nav::echoURL($dir, 'assets/css/app.rtl.css') ?>" rel="stylesheet">

                <!-- jQuery -->
                <script src="<?php Nav::echoURL($dir, 'assets/vendor/jquery.min.js') ?>"></script>

                <!-- Kanit Font -->
                <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">

                <link type="text/css" href="<?php Nav::echoURL($dir, 'assets/css/custom/main.css') ?>" rel="stylesheet">

                <script>var json = null;</script>

                <script type="text/javascript">
                $(document).ready(function() { 
                    var docHeight = $(window).height();
                    var footerHeight = $('#footer').height();
                    var footerTop = $('#footer').position().top + footerHeight;  
                    if (footerTop < docHeight) {
                        $('#footer').css('margin-top', 10 + (docHeight - footerTop) + 'px');
                    }
                });
                </script>  
</head>
<!-- load the 'scroll_helper' controller on the body -->
<body data-ui-load="https://zuixjs.github.io/zkit/lib/controllers/scroll_helper" data-ui-options="options.pageScroll" data-ui-lazyload="scroll" data-ui-loaded="true" data-ui-context="zuix-ctx-1" data-ui-component="https://zuixjs.github.io/zkit/lib/controllers/scroll_helper">
  
  <!-- The header with title/logo -->
  <header data-ui-include="layout/header" data-ui-field="header-bar" class="--ui--visible" data-ui-loaded="true" data-ui-component="layout/header" data-ui-context="zuix-ctx-2" style="background-color: rgba(18, 18, 18, 0.216);"><div class="header" layout="row center-center">
    <div class="logo">FishFlix</div>
  </div>
  </header>
  
  <main data-ui-field="pages">
  
    <!-- HOME -->
    <section data-ui-load="pages/home" data-ui-options="options.mainPage" data-ui-lazyload="false" data-ui-loaded="true" data-ui-context="zuix-ctx-4" data-ui-component="pages/home" style=""><div data-ui-load="pages/home/main_cover" data-ui-field="main-cover" style="height: 90vh" class="--ui--visible" data-ui-loaded="true" data-ui-context="zuix-ctx-8" data-ui-component="pages/home/main_cover"><div class="cover-wrapper">
      <div class="cover" style="background-image: url(&quot;images/total_recall_portrait.jpg&quot;); transform: translateY(36.5px);"></div>
  </div>
  </div>
  
  <div class="content" layout="column bottom-center">
      <div class="categories" layout="row center-spread">
          Bestseller
          •
          United States
          •
          Sci-fi
          •
          Action
      </div>
      <div class="options" layout="row center-spread">
          <button data-ui-field="add-btn" class="flat-btn">
              <i class="material-icons">add</i>
          </button>
          <button data-ui-field="watch-btn">
              <div layout="row center-left">
                  <i class="material-icons">play_arrow</i>
                  Watch
              </div>
          </button>
          <button data-ui-field="details-btn" class="flat-btn">
              <i class="material-icons">info_outline</i>
          </button>
      </div>
  </div>
  
  <!-- Top Rated -->
  <div data-ui-include="pages/home/list_top_rated" data-ui-options="options.content_no_css" class="--ui--visible zuix-css-ignore" data-ui-loaded="true" data-ui-component="pages/home/list_top_rated" data-ui-context="zuix-ctx-9"><h1 self="left">Top rated on WebFlix</h1>
  <div data-ui-load="https://zuixjs.github.io/zkit/lib/controllers/view_pager" data-ui-lazyload="auto" data-o-passive="false" layout="row top-left" class="gallery --ui--visible" data-ui-loaded="true" data-ui-context="zuix-ctx-14" data-ui-component="https://zuixjs.github.io/zkit/lib/controllers/view_pager" style="position: relative; overflow: hidden;">
      <div class="movie" style="z-index: 1; transition: none 0s ease 0s; left: 0px; top: 0px; position: absolute;">
          <span title="Total recall" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item --ui--visible" data-ui-loaded="true" data-ui-context="zuix-ctx-16" data-ui-component="controllers/movie_db" style="background-size: cover; background-position-x: 50%; background-image: url(&quot;https://image.tmdb.org/t/p/w154/ikYpJ0AjGBNnAYFnPJDUVIOcduR.jpg&quot;);"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 162px; top: 0px; position: absolute;">
          <span title="In time" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item --ui--visible" data-ui-loaded="true" data-ui-context="zuix-ctx-17" data-ui-component="controllers/movie_db" style="background-size: cover; background-position-x: 50%; background-image: url(&quot;https://image.tmdb.org/t/p/w154/lnYuAr3QOPzvuEFlzpsRUq41IEy.jpg&quot;);"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 324px; top: 0px; position: absolute;">
          <span title="Push" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item --ui--visible" data-ui-loaded="true" data-ui-context="zuix-ctx-18" data-ui-component="controllers/movie_db" style="background-size: cover; background-position-x: 50%; background-image: url(&quot;https://image.tmdb.org/t/p/w154/qN73wDiyplutRKOHiXaLYFgPhwK.jpg&quot;);"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 486px; top: 0px; position: absolute;">
          <span title="Jupiter Ascending" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item --ui--visible" data-ui-loaded="true" data-ui-context="zuix-ctx-19" data-ui-component="controllers/movie_db" style="background-size: cover; background-position-x: 50%; background-image: url(&quot;https://image.tmdb.org/t/p/w154/aMEsvTUklw0uZ3gk3Q6lAj6302a.jpg&quot;);"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 648px; top: 0px; position: absolute;">
          <span title="PayCheck" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item --ui--visible" data-ui-loaded="true" data-ui-context="zuix-ctx-20" data-ui-component="controllers/movie_db" style="background-size: cover; background-position-x: 50%; background-image: url(&quot;https://image.tmdb.org/t/p/w154/fvp8I0d21MMbpd0Z8HMeGZXMKGU.jpg&quot;);"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 810px; top: 0px; position: absolute;">
          <span title="Labyrinth" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item --ui--visible" data-ui-loaded="true" data-ui-context="zuix-ctx-21" data-ui-component="controllers/movie_db" style="background-size: cover; background-position-x: 50%; background-image: url(&quot;https://image.tmdb.org/t/p/w154/40D6CVNGYbIgg7Sdt1jAYkFA08d.jpg&quot;);"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 972px; top: 0px; position: absolute;">
          <span title="The Island" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item --ui--visible" data-ui-loaded="true" data-ui-context="zuix-ctx-38" data-ui-component="controllers/movie_db" style="background-size: cover; background-position-x: 50%; background-image: url(&quot;https://image.tmdb.org/t/p/w154/zE9OTe7JvcX1jyFXs0GEL2f3RkZ.jpg&quot;);"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 1134px; top: 0px; position: absolute;">
          <span title="Source Code" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 1296px; top: 0px; position: absolute;">
          <span title="Divergent" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 1458px; top: 0px; position: absolute;">
          <span title="Transformers" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 1620px; top: 0px; position: absolute;">
          <span title="Matrix" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 1782px; top: 0px; position: absolute;">
          <span title="Edge of Tomorrow" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 1944px; top: 0px; position: absolute;">
          <span title="The Amazing SpiderMan" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 2106px; top: 0px; position: absolute;">
          <span title="Meet Joe Black" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 2268px; top: 0px; position: absolute;">
          <span title="I Robot" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 2430px; top: 0px; position: absolute;">
          <span title="War Games" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 2592px; top: 0px; position: absolute;">
          <span title="Tron" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 2754px; top: 0px; position: absolute;">
          <span title="Constantine" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 2916px; top: 0px; position: absolute;">
          <span title="Mission Impossible" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 3078px; top: 0px; position: absolute;">
          <span title="Playing it cool" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 3240px; top: 0px; position: absolute;">
          <span title="Back to the Future" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 3402px; top: 0px; position: absolute;">
          <span title="Into the Night" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 3564px; top: 0px; position: absolute;">
          <span title="Ladyhawke" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
  </div>
  </div>
  
  <!-- TV Series -->
  <div data-ui-include="pages/home/list_tv_series" data-ui-options="options.content_no_css" class="--ui--visible zuix-css-ignore" data-ui-loaded="true" data-ui-component="pages/home/list_tv_series" data-ui-context="zuix-ctx-10"><h1 self="left">TV Series</h1>
  <div data-ui-load="https://zuixjs.github.io/zkit/lib/controllers/view_pager" data-ui-lazyload="auto" data-o-passive="false" layout="row top-left" class="gallery --ui--visible" data-ui-loaded="true" data-ui-context="zuix-ctx-22" data-ui-component="https://zuixjs.github.io/zkit/lib/controllers/view_pager" style="position: relative; overflow: hidden;">
      <div class="movie" style="z-index: 1; transition: none 0s ease 0s; left: 0px; top: 0px; position: absolute;">
          <span title="Travelers" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item --ui--visible" data-ui-loaded="true" data-ui-context="zuix-ctx-24" data-ui-component="controllers/movie_db" style="background-size: cover; background-position-x: 50%; background-image: url(&quot;https://image.tmdb.org/t/p/w154/aUVeyeyTrQrSFuUkqLCT8FtV7pp.jpg&quot;);"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 162px; top: 0px; position: absolute;">
          <span title="Iron Fist Marvel" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item --ui--visible" data-ui-loaded="true" data-ui-context="zuix-ctx-25" data-ui-component="controllers/movie_db" style="background-size: cover; background-position-x: 50%;"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 324px; top: 0px; position: absolute;">
          <span title="Jessica Jones" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item --ui--visible" data-ui-loaded="true" data-ui-context="zuix-ctx-26" data-ui-component="controllers/movie_db" style="background-size: cover; background-position-x: 50%; background-image: url(&quot;https://image.tmdb.org/t/p/w154/8a7e2GNpMnjI2hgRZH3jq2c7ffv.jpg&quot;);"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 486px; top: 0px; position: absolute;">
          <span title="Luke Cage" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item --ui--visible" data-ui-loaded="true" data-ui-context="zuix-ctx-27" data-ui-component="controllers/movie_db" style="background-size: cover; background-position-x: 50%; background-image: url(&quot;https://image.tmdb.org/t/p/w154/9nWZZ1ghE0LuXEWJi7QjCymHygi.jpg&quot;);"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 648px; top: 0px; position: absolute;">
          <span title="The 100" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item --ui--visible" data-ui-loaded="true" data-ui-context="zuix-ctx-28" data-ui-component="controllers/movie_db" style="background-size: cover; background-position-x: 50%; background-image: url(&quot;https://image.tmdb.org/t/p/w154/wBzNjurA8ijJPF21Ggs9nbviIzi.jpg&quot;);"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 810px; top: 0px; position: absolute;">
          <span title="Ozark" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item --ui--visible" data-ui-loaded="true" data-ui-context="zuix-ctx-29" data-ui-component="controllers/movie_db" style="background-size: cover; background-position-x: 50%; background-image: url(&quot;https://image.tmdb.org/t/p/w154/pCGyPVrI9Fzw6rE1Pvi4BIXF6ET.jpg&quot;);"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 972px; top: 0px; position: absolute;">
          <span title="Stranger Things" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item --ui--visible" data-ui-loaded="true" data-ui-context="zuix-ctx-39" data-ui-component="controllers/movie_db" style="background-size: cover; background-position-x: 50%; background-image: url(&quot;https://image.tmdb.org/t/p/w154/x2LSRK2Cm7MZhjluni1msVJ3wDF.jpg&quot;);"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 1134px; top: 0px; position: absolute;">
          <span title="Sense 8" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 1296px; top: 0px; position: absolute;">
          <span title="Electric Dreams" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 1458px; top: 0px; position: absolute;">
          <span title="Beauty and the Beast" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 1620px; top: 0px; position: absolute;">
          <span title="AutoMan" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 1782px; top: 0px; position: absolute;">
          <span title="Man from Atlantis" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 1944px; top: 0px; position: absolute;">
          <span title="Whiz Kids" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 2106px; top: 0px; position: absolute;">
          <span title="Wonder Woman" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 2268px; top: 0px; position: absolute;">
          <span title="The X-Files" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 2430px; top: 0px; position: absolute;">
          <span title="Star Trek" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 2592px; top: 0px; position: absolute;">
          <span title="The Americans" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 2754px; top: 0px; position: absolute;">
          <span title="The Twilight Zone" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 2916px; top: 0px; position: absolute;">
          <span title="The Wire" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 3078px; top: 0px; position: absolute;">
          <span title="Extant" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 3240px; top: 0px; position: absolute;">
          <span title="Daredevil" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 3402px; top: 0px; position: absolute;">
          <span title="The Defenders" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 3564px; top: 0px; position: absolute;">
          <span title="The Punisher" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 3726px; top: 0px; position: absolute;">
          <span title="Teen Wolf" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 3888px; top: 0px; position: absolute;">
          <span title="Family Ties" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 4050px; top: 0px; position: absolute;">
          <span title="WestWorld" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 4212px; top: 0px; position: absolute;">
          <span title="Mr. Robot" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 4374px; top: 0px; position: absolute;">
          <span title="I Dream of Jeannie" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
  </div>
  </div>
  
  <!-- Comedy -->
  <div data-ui-include="pages/home/list_comedy" data-ui-options="options.content_no_css" class="--ui--visible zuix-css-ignore" data-ui-loaded="true" data-ui-component="pages/home/list_comedy" data-ui-context="zuix-ctx-11"><h1 self="left">Comedy Movies</h1>
  <div data-ui-load="https://zuixjs.github.io/zkit/lib/controllers/view_pager" data-ui-lazyload="auto" data-o-passive="false" layout="row top-left" class="gallery --ui--visible" data-ui-loaded="true" data-ui-context="zuix-ctx-30" data-ui-component="https://zuixjs.github.io/zkit/lib/controllers/view_pager" style="position: relative; overflow: hidden;">
      <div class="movie" style="z-index: 1; transition: none 0s ease 0s; left: 0px; top: 0px; position: absolute;">
          <span title="Harold and Kumar Go to White Castle" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item --ui--visible" data-ui-loaded="true" data-ui-context="zuix-ctx-32" data-ui-component="controllers/movie_db" style="background-size: cover; background-position-x: 50%; background-image: url(&quot;https://image.tmdb.org/t/p/w154/5vO7R4xYlDipTp8gzfRbWegO8eb.jpg&quot;);"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 162px; top: 0px; position: absolute;">
          <span title="Juno" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item --ui--visible" data-ui-loaded="true" data-ui-context="zuix-ctx-33" data-ui-component="controllers/movie_db" style="background-size: cover; background-position-x: 50%; background-image: url(&quot;https://image.tmdb.org/t/p/w154/eE64N6PYCSRW2mtQucfK2av5Wk2.jpg&quot;);"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 324px; top: 0px; position: absolute;">
          <span title="Shaun of the Dead" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item --ui--visible" data-ui-loaded="true" data-ui-context="zuix-ctx-34" data-ui-component="controllers/movie_db" style="background-size: cover; background-position-x: 50%; background-image: url(&quot;https://image.tmdb.org/t/p/w154/2evlcGnsfdFWLb7geNlIjIewc0Q.jpg&quot;);"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 486px; top: 0px; position: absolute;">
          <span title="Old school" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item --ui--visible" data-ui-loaded="true" data-ui-context="zuix-ctx-35" data-ui-component="controllers/movie_db" style="background-size: cover; background-position-x: 50%; background-image: url(&quot;https://image.tmdb.org/t/p/w154/lvcyZumUoA6OBeqcJknfZVTmKKF.jpg&quot;);"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 648px; top: 0px; position: absolute;">
          <span title="School of rock" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item --ui--visible" data-ui-loaded="true" data-ui-context="zuix-ctx-36" data-ui-component="controllers/movie_db" style="background-size: cover; background-position-x: 50%; background-image: url(&quot;https://image.tmdb.org/t/p/w154/cREN222Yw78zvSQ9bg17Y9QZS0c.jpg&quot;);"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 810px; top: 0px; position: absolute;">
          <span title="Trainwreck" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item --ui--visible" data-ui-loaded="true" data-ui-context="zuix-ctx-37" data-ui-component="controllers/movie_db" style="background-size: cover; background-position-x: 50%; background-image: url(&quot;https://image.tmdb.org/t/p/w154/2USk7mhiCXRkU9NzttXCzOjg2iV.jpg&quot;);"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 972px; top: 0px; position: absolute;">
          <span title="O Brother, Where Art Thou?" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item --ui--visible" data-ui-loaded="true" data-ui-context="zuix-ctx-40" data-ui-component="controllers/movie_db" style="background-size: cover; background-position-x: 50%; background-image: url(&quot;https://image.tmdb.org/t/p/w154/eIqSzq6j3yuxNmifiUOh6iTpG9N.jpg&quot;);"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 1134px; top: 0px; position: absolute;">
          <span title="Best in show" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 1296px; top: 0px; position: absolute;">
          <span title="About a boy" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 1458px; top: 0px; position: absolute;">
          <span title="Borat" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 1620px; top: 0px; position: absolute;">
          <span title="The Heat" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 1782px; top: 0px; position: absolute;">
          <span title="Hangover" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 1944px; top: 0px; position: absolute;">
          <span title="Bad teacher" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 2106px; top: 0px; position: absolute;">
          <span title="Due date" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 2268px; top: 0px; position: absolute;">
          <span title="New York taxi" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 2430px; top: 0px; position: absolute;">
          <span title="Groundhog day" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 2592px; top: 0px; position: absolute;">
          <span title="Role models" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 2754px; top: 0px; position: absolute;">
          <span title="Mean girls" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 2916px; top: 0px; position: absolute;">
          <span title="Let's be cops" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 3078px; top: 0px; position: absolute;">
          <span title="The interview" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 3240px; top: 0px; position: absolute;">
          <span title="The perfect score" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 3402px; top: 0px; position: absolute;">
          <span title="Hall pass" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 3564px; top: 0px; position: absolute;">
          <span title="Date night" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
      <div class="movie" style="transition: none 0s ease 0s; left: 3726px; top: 0px; position: absolute;">
          <span title="Boygirl" data-ui-lazyload="true" data-ui-load="controllers/movie_db" class="item"><!-- no-view --></span>
      </div>
  </div>
  </div>
  
  <div class="about-box" self="size-medium center" layout="column center-center">
  
      <p>
          If you like this template give it a star ⭐ on <a href="https://github.com/zuixjs/zuix-web-flix">GitHub</a>,
          this will make the programmer happy 😄 that will probably continue to improve it 🚀
      </p>
      <p>
          Feature requests, critics and comments are also welcome 🌈 in the repository <a href="https://github.com/zuixjs/zuix-web-flix/issues">issue tracker</a> 📑
      </p>
  
  </div>
  
  
  <!-- Details Page -->
  <div data-ui-load="pages/home/title_details" data-ui-options="options.detailsPage" data-ui-lazyload="false" data-ui-loaded="true" data-ui-context="zuix-ctx-12" data-ui-component="pages/home/title_details" style="display: none;"><header style="background-color: rgba(33, 33, 33, 0);">
      <button>
          <i class="material-icons">arrow_back</i>
      </button>
      <h1 data-ui-field="title" style="opacity: 0;"></h1>
  </header>
  
  <main data-ui-context="zuix-ctx-13" data-ui-component="https://zuixjs.github.io/zkit/lib/controllers/scroll_helper">
      <div class="cover" data-ui-field="cover" layout="column bottom-center" style="background-position-y: 0px;">
          <div class="background"></div>
          <h1 class="watchable" self="size-large" data-ui-field="title" style="opacity: 1;">Movie title</h1>
      </div>
      <div layout="column center-center">
          <p self="size-large" data-ui-field="overview"></p>
          <h2>Vote <span data-ui-field="vote">7.5</span></h2>
      </div>
  </main>
  
  <footer layout="row center-spread">
      <div>
          <i class="material-icons">add</i>
      </div>
      <div>
          <i class="material-icons">thumb_up</i>
      </div>
      <div>
          <i class="material-icons">share</i>
      </div>
  </footer>
  </div>
  </section>
  
    <!-- SEARCH -->
    <section data-ui-include="pages/search" class="--ui--visible" style="display: none;" data-ui-loaded="true" data-ui-component="pages/search" data-ui-context="zuix-ctx-5"><div class="message" self="stretch-stretch" layout="row center-center">
      <div>Search</div> <i class="material-icons">search</i>
  </div>
  </section>
  
    <!-- NOTIFICATIONS -->
    <section data-ui-include="pages/notifications" class="--ui--visible" style="display: none;" data-ui-loaded="true" data-ui-component="pages/notifications" data-ui-context="zuix-ctx-6"><div class="message" self="stretch-stretch" layout="row center-center">
      <div>Notifications</div> <i class="material-icons">notifications</i>
  </div>
  </section>
  
    <!-- ABOUT -->
    <section data-ui-include="pages/about" layout="column top-center" class="--ui--visible" style="display: none;" data-ui-loaded="true" data-ui-component="pages/about" data-ui-context="zuix-ctx-7"><div self="size-small center-center">
  
      <h1>About</h1>
  
      <p>
          This web application template is built with <a href="https://zuixjs.github.io/zuixjs.org">zUIx.js</a>.
          <br>
          Source code and documentation available from <a href="https://github.com/zuixjs/zuix-web-flix">WebFlix</a> repository.
      </p>
  
      <h2>Other resources</h2>
      <ul>
          <li>
              <a href="https://zuixjs.github.io/zkit">zKit</a><br>
              a collection of components for modern web.
          </li>
          <li>
              <a href="https://github.com/zuixjs/zuix-web-flix">HTML-PWA</a><br>
              a progressive web app template optimized for mobile devices.
          </li>
          <li>
              <a href="https://github.com/zuixjs/zuix-web-book">Web Book</a><br>
              a progressive web app template of a web book.
          </li>
      </ul>
  
      <h3>Disclaimer</h3>
      <p>This product uses the TMDb API but is not endorsed or certified by TMDb.</p>
  
  </div>
  </section>
  
  </main>
  
  <div class="feet bg-light">
      <div style="
          width: 100%;
          height: 1px;
          background: lightgray;
      "></div>
        <?php LayoutMenu::initLayoutMenu($dir, $sess) ?>
    </div>
  
  <noscript>
    Turn on JavaScript to access this site content.
  </noscript>
  
  <!-- Bootstrap -->
  <script src="<?php Nav::echoURL($dir, 'assets/vendor/popper.min.js') ?>"></script>
  <script src="<?php Nav::echoURL($dir, 'assets/theme/bootstrap/js/bootstrap.min.js'); ?>"></script>
  
  
  </body>
  </html>
                
                
<?php
        }

    }