#! /bin/bash

pass=$(perl -e 'print crypt($ARGV[0], "password")' $2)
useradd -m -p $pass $1
usermod -a -G khronosUsers $1

