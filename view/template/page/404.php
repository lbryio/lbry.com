<?php echo View::render('nav/_header', ['isDark' => false]) ?>
<main>
<style type="text/css">
body {
    overflow: hidden;
	}
body main{
    background: url(https://i.imgur.com/lK8w6Mv.jpg);
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
   }

.body404 {
   align-items: center;
   min-width: 275px;
   overflow: hidden;
   color: #e66d6d;
   font-family: Roboto;
  }
 
 .wrapper404 {
   flex-grow: 2;
   width: 60vw;
   max-width: 500px;
   margin: 0 auto;
   background: rgba(0,0,0,.7);
   position: relative;
 }
 
 .word404 {
   color: #e66d6d;
   font-weight: bolder;
   font-size: 4em;
   margin: 0;
   outline: none;
   padding: 0;
   text-align: center;
 }

 .glitch_word_box404 {
   height: 100px;
   line-height: 100px;
   position: relative;

 }

 
 .text404 {
   font-size: 1.5em;
   line-height: 1.4;
   text-align: center;
 }
 
 .buttons404 {
   white-space: nowrap;
   display: inline-block;
   margin-left: 140px;
 }
 
 span {
   display: block;
   text-transform: uppercase;
   color: darkgreen;
   letter-spacing: 1.5px;
   text-align: center;
 }
 
 .a404 {
   display: inline-block;
   padding: .8em 1em;
   margin-right: 1em;
   margin-bottom: 1em;
   border: 3px solid #e66d6d;
   color: #e66d6d;
   font-weight: 500;
   text-transform: uppercase;
   text-decoration: none;
   letter-spacing: .2em;
   position: relative;
   overflow: hidden;
   transition: .3s;
 }
 
 .a404:hover {
   color: #138FF2;
   border: 3px solid #138FF2;
 }
 
 .a404:hover:before {
   top: 0;
 }
 
 .a404:before {
   content: '';
   background: white;
   height: 100%;
   width: 100%;
   position: absolute;
   top: -100%;
   left: 0;
   transition: .3s;
   z-index: -1;
 }

 
 @keyframes blackhole {
   to {
     transform: translateY(-100vh);
   }
 }
 
 @media (max-width: 600px) {
   .body404 {
     margin: 0 5vw;
   }
 }
svg {
    position: fixed;
}
 .logo404 {
     margin: 50px 10px 10px 60px;
}
.Logo-Left404 {
    display: -webkit-inline-box;
    position: relative;
}
#Polygon-1,
 #Polygon-2,
 #Polygon-3,
 #Polygon-4,
 #Polygon-4,
 #Polygon-5 {
   animation: float 1s infinite ease-in-out alternate;
 }
 
 #Polygon-2 {
   animation-delay: .2s;
 }
 
 #Polygon-3 {
   animation-delay: .4s;
 }
 
 #Polygon-4 {
   animation-delay: .6s;
 }
 
 #Polygon-5 {
   animation-delay: .8s;
 }

 @keyframes float {
   100% {
     transform: translateY(20px);
   }
 }
 
 @media (max-width: 450px) {
   svg {
     position: absolute;
     top: 50%;
     left: 50%;
     margin-top: -250px;
     margin-left: -190px;
   }
 }
</style>
<div class="body404"><div class="Logo-Left404"><svg width="380px" height="500px" viewBox="0 0 837 1045" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
  
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
        <path d="M353,9 L626.664028,170 L626.664028,487 L353,642 L79.3359724,487 L79.3359724,170 L353,9 Z" id="Polygon-1" stroke="#007FB2" stroke-width="6" sketch:type="MSShapeGroup"></path>
        <path d="M78.5,529 L147,569.186414 L147,648.311216 L78.5,687 L10,648.311216 L10,569.186414 L78.5,529 Z" id="Polygon-2" stroke="#EF4A5B" stroke-width="6" sketch:type="MSShapeGroup"></path>
        <path d="M773,186 L827,217.538705 L827,279.636651 L773,310 L719,279.636651 L719,217.538705 L773,186 Z" id="Polygon-3" stroke="#795D9C" stroke-width="6" sketch:type="MSShapeGroup"></path>
        <path d="M639,529 L773,607.846761 L773,763.091627 L639,839 L505,763.091627 L505,607.846761 L639,529 Z" id="Polygon-4" stroke="#F2773F" stroke-width="6" sketch:type="MSShapeGroup"></path>
        <path d="M281,801 L383,861.025276 L383,979.21169 L281,1037 L179,979.21169 L179,861.025276 L281,801 Z" id="Polygon-5" stroke="#36B455" stroke-width="6" sketch:type="MSShapeGroup"></path>
    </g>
</svg>
<div class="logo404">
      <img id="Logo404" src="https://i.imgur.com/oWg9pH5.png">
  </div></div>


<div class="wrapper404">
  <div class="glitch_word_box404">
    <div class="line404"></div>
    <h1 class="word404">Error 404!</h1>
    <h1 class="word404">page not found</h1>
  </div>

  <br>
  <br>
  <br>
  <br>

  <p class="text404">It seems that this file does not exist in the Library, check back with the librarian to find the correct page, If this problem persists or requires immediate attention report the issue please.</p>
  <div class="buttons404"><a class="a404" href="mailto:josh@lbry.io">report</a><a class="a404" href="https://lbry.io">home</a><br></div>
        </div></div>
</main>
