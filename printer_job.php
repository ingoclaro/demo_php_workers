<?php
class PrinterJob {

  public function perform() {
    echo $this->args['name'] ." is from ". $this->args['location'] ."\n\n";
  }

}
