<?php
require 'vendor/php-resque/Resque.php';

Resque::setBackend('localhost:6379');

$args = array(
  'name' => 'Santa',
  'location' => 'North Pole'
);

$ret = Resque::enqueue('default', 'PrinterJob', $args, true);

echo "waiting on job to complete.";

$status = new Resque_Job_Status($ret);
while ($status->get() == Resque_Job_Status::STATUS_WAITING
  || $status->get() == Resque_Job_Status::STATUS_RUNNING) {

  usleep(500);
  echo ".";
}

echo "\n";
echo "job completed ";
if ($status->get() == Resque_Job_Status::STATUS_COMPLETE) {
  echo "successfully.\n";
} else {
  echo "with an error.\n";
}
