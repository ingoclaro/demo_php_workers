#!/bin/bash

export QUEUE=default
export REDIS_BACKEND=localhost:6379
export APP_INCLUDE=app_include.php
export COUNT=1

php resque.php
