<style>
.container {
  width: 210px;
  height: 140px;
  position: relative;
  perspective: 1000px;
}

#carousel {
  width: 100%;
  height: 100%;
  position: absolute;
  transform-style: preserve-3d;
}

#carousel figure {
  margin: 0;
  display: block;
  position: absolute;
  width: 186px;
  height: 116px;
  left: 10px;
  top: 10px;
  border: 2px solid black;
}

#carousel figure:nth-child(1) { transform: rotateX(   0deg ); }
#carousel figure:nth-child(2) { transform: rotateX(  40deg ); }
#carousel figure:nth-child(3) { transform: rotateX(  80deg ); }
#carousel figure:nth-child(4) { transform: rotateX( 120deg ); }
#carousel figure:nth-child(5) { transform: rotateX( 160deg ); }
#carousel figure:nth-child(6) { transform: rotateX( 200deg ); }
#carousel figure:nth-child(7) { transform: rotateX( 240deg ); }
#carousel figure:nth-child(8) { transform: rotateX( 280deg ); }
#carousel figure:nth-child(9) { transform: rotateX( 320deg ); }

#carousel figure:nth-child(1) { transform: rotateX(   0deg ) translateZ( 288px ); }
#carousel figure:nth-child(2) { transform: rotateX(  40deg ) translateZ( 288px ); }
#carousel figure:nth-child(3) { transform: rotateX(  80deg ) translateZ( 288px ); }
#carousel figure:nth-child(4) { transform: rotateX( 120deg ) translateZ( 288px ); }
#carousel figure:nth-child(5) { transform: rotateX( 160deg ) translateZ( 288px ); }
#carousel figure:nth-child(6) { transform: rotateX( 200deg ) translateZ( 288px ); }
#carousel figure:nth-child(7) { transform: rotateX( 240deg ) translateZ( 288px ); }
#carousel figure:nth-child(8) { transform: rotateX( 280deg ) translateZ( 288px ); }
#carousel figure:nth-child(9) { transform: rotateX( 320deg ) translateZ( 288px ); }
</style>

<script type="text/javascript">
	var tz = Math.round( ( panelSize / 2 ) / 
	  Math.tan( ( ( Math.PI * 2 ) / numberOfPanels ) / 2 ) );
	// or simplified to
	var tz = Math.round( ( panelSize / 2 ) / 
	  Math.tan( Math.PI / numberOfPanels ) );
</script>

<section class="container">
  <div id="carousel">
    <figure>1</figure>
    <figure>2</figure>
    <figure>3</figure>
    <figure>4</figure>
    <figure>5</figure>
    <figure>6</figure>
    <figure>7</figure>
    <figure>8</figure>
    <figure>9</figure>
  </div>
</section>