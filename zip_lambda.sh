#!/usr/bin/env bash

zip -r lambda.zip * -x '*.git*' -x '*.idea*' -x '*phpunit*' -x '*tests*' -x '*fzaninotto*' -x '*mockery*'
