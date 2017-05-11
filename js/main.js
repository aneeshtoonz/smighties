(function($, R) {

    R.ready(function() {
        console.log('R.deviceW() = ' + R.deviceW()
      + '<br>R.deviceH() = ' + R.deviceH()
      + '<br>R.deviceMax() = ' + R.deviceMax()
      + '<br>R.deviceMin() = ' + R.deviceMin()
      + '<br>R.dpr() = ' + R.dpr());
    });

    R.crossover(function(){
        console.log("Crossiover");
    }); 

  }(this.jQuery, this.Response));
