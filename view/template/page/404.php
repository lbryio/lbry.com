<?php echo View::render('nav/_header', ['isDark' => false]) ?>
<main>
<style type="text/css">
body {
    overflow: hidden;
	}
body main{
	background:-webkit-gradient(linear,
	right top, left bottom,
	color-stop(0.01,purple),
	color-stop(0.1,indigo),
	color-stop(0.2,blue),
	color-stop(0.4,green),
	color-stop(0.5,yellow),
	color-stop(0.7,orange),
	color-stop(0.8,red),
	color-stop(0.99,purple));
	-webkit-background-size: 100%;
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
   color: #e66d6d; 
 }
 
 .buttons404 {
   white-space: nowrap;
   display: inline-block;
   margin-left: 140px;
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
</style>

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

  <p class="text404">It seems that this page does not exist, If this problem persists or requires immediate attention report the issue please.</p>
  <div class="buttons404"><a class="a404" href="https://lbry.io">home</a><a class="a404" href="mailto:josh@lbry.io">report</a><br></div>
        </div>
</main>
