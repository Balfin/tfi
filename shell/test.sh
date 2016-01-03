#!/bin/bash

if [ -z "$1" ]
then 
var="default"
else
var="$1"
fi

echo $var

if [ $my_variable ]
then
echo $my_variable
fi

while getopts ":abc" opt
do
case $opt in
a) echo "Found option $opt"
echo "Found  argument for option $opt - $OPTARG"
;;
b) echo "Found option $opt";;
c) echo "Found option $opt";;
*) echo "No reasonable options found!";;
esac
done
