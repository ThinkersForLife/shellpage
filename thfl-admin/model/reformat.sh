#!/bin/bash

number=1
dirt=`pwd`

# check and make a dir called edit 
if [ -d ./edit ]; then
echo "check the edit folder"
else
	mkdir ./edit
fi
#mkdir ./edit

# Loop until all parameters are used up
while [ "$1" != "" ]; do
    echo "Converting $1"
#    echo "You now have $# positional parameters"
	filn=`basename $1`
	mogrify -path $dirt/edit/ -resize 240x240 $1 
	mv $dirt/edit/$filn $dirt/edit/$number
	mogrify -extent 240x240 -gravity Center -fill white $dirt/edit/$number
	mogrify -format jpg -strip -quality 92 $dirt/edit/$number 
	rm $dirt/edit/$number
#	rm $dirt/$1
  	echo "$1 is converted edit/$number.jpg created" 
number=$((number + 1))
 # Shift all the parameters down by one
    shift

done


#mogrify -resize 320x240 .jpg
#mogrify -extent 240x180 -gravity Center -fill white 3.jpg
#mogrify -format jpg -quality 92 

