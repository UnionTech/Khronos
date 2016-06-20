#! /bin/bash
a="test"
echo $a
sed "/$a/ d" test.txt > u.txt
mv u.txt test.txt
