# -*- coding: utf-8 -*-
import numpy as np
import cv2
import json
from PIL import Image
from PIL import ImageFilter
import pytesseract
from mtranslate import translate
from skimage.filters import threshold_adaptive
#!C:\Program Files\Python27
#We will need a comment here depending on your server. It is basically telling the server where your python.exe is in order to interpret the language. The server is too lazy to do it itself.

import sys
li=[]
print(sys.argv)
for arg in sys.argv:
	 #print arg ,
	 li.append(arg)


class image_to_text(object):
    def __init__(self):
            print ("in init")
    def order_points(self, pts):
        # initialzie a list of coordinates that will be ordered
        # such that the first entry in the list is the top-left,
        # the second entry is the top-right, the third is the
        # bottom-right, and the fourth is the bottom-left
        rect = np.zeros((4, 2), dtype="float32")

        # the top-left point will have the smallest sum, whereas
        # the bottom-right point will have the largest sum
        s = pts.sum(axis=1)
        rect[0] = pts[np.argmin(s)]
        rect[2] = pts[np.argmax(s)]

        # now, compute the difference between the points, the
        # top-right point will have the smallest difference,
        # whereas the bottom-left will have the largest difference
        diff = np.diff(pts, axis=1)
        rect[1] = pts[np.argmin(diff)]
        rect[3] = pts[np.argmax(diff)]

        # return the ordered coordinates
        return rect

    def four_point_transform(self, image, pts):
        # obtain a consistent order of the points and unpack them
        # individually
        rect = self.order_points(pts)
        (tl, tr, br, bl) = rect

        # compute the width of the new image, which will be the
        # maximum distance between bottom-right and bottom-left
        # x-coordiates or the top-right and top-left x-coordinates
        widthA = np.sqrt(((br[0] - bl[0]) ** 2) + ((br[1] - bl[1]) ** 2))
        widthB = np.sqrt(((tr[0] - tl[0]) ** 2) + ((tr[1] - tl[1]) ** 2))
        maxWidth = max(int(widthA), int(widthB))

        # compute the height of the new image, which will be the
        # maximum distance between the top-right and bottom-right
        # y-coordinates or the top-left and bottom-left y-coordinates
        heightA = np.sqrt(((tr[0] - br[0]) ** 2) + ((tr[1] - br[1]) ** 2))
        heightB = np.sqrt(((tl[0] - bl[0]) ** 2) + ((tl[1] - bl[1]) ** 2))
        maxHeight = max(int(heightA), int(heightB))

        # now that we have the dimensions of the new image, construct
        # the set of destination points to obtain a "birds eye view",
        # (i.e. top-down view) of the image, again specifying points
        # in the top-left, top-right, bottom-right, and bottom-left
        # order
        dst = np.array([
            [0, 0],
            [maxWidth - 1, 0],
            [maxWidth - 1, maxHeight - 1],
            [0, maxHeight - 1]], dtype="float32")

        # compute the perspective transform matrix and then apply it
        M = cv2.getPerspectiveTransform(rect, dst)
        warped = cv2.warpPerspective(image, M, (maxWidth, maxHeight))

        # return the warped image
        return warped

    def translate(self, image, x, y):
        # Define the translation matrix and perform the translation
        M = np.float32([[1, 0, x], [0, 1, y]])
        shifted = cv2.warpAffine(image, M, (image.shape[1], image.shape[0]))

        # Return the translated image
        return shifted

    def rotate(self, image, angle, center=None, scale=1.0):
        # Grab the dimensions of the image
        (h, w) = image.shape[:2]

        # If the center is None, initialize it as the center of
        # the image
        if center is None:
            center = (w / 2, h / 2)

        # Perform the rotation
        M = cv2.getRotationMatrix2D(center, angle, scale)
        rotated = cv2.warpAffine(image, M, (w, h))

        # Return the rotated image
        return rotated

    def resize(self, image, width=None, height=None, inter=cv2.INTER_AREA):
        # initialize the dimensions of the image to be resized and
        # grab the image size
        dim = None
        (h, w) = image.shape[:2]

        # if both the width and height are None, then return the
        # original image
        if width is None and height is None:
            return image

        # check to see if the width is None
        if width is None:
            # calculate the ratio of the height and construct the
            # dimensions
            r = height / float(h)
            dim = (int(w * r), height)

        # otherwise, the height is None
        else:
            # calculate the ratio of the width and construct the
            # dimensions
            r = width / float(w)
            dim = (width, int(h * r))

        # resize the image
        resized = cv2.resize(image, dim, interpolation=inter)

        # return the resized image
        return resized

    def scan(self, filename):
        # load the image and compute the ratio of the old height
        # to the new height, clone it, and resize it
        print ("STEP 1: Reading the image")
        image = cv2.imread(filename)
        ratio = image.shape[0] / 500.0
        orig = image.copy()
        image = self.resize(image, height=500)

        # # convert the image to grayscale, blur it, and find edges
        # # in the image
        gray = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)
        gray = cv2.GaussianBlur(gray, (5, 5), 0)
        edged = cv2.Canny(gray, 75, 200)

        # show the original image and the edge detected image
        # print ("STEP 1: Edge Detection")
        # cv2.imshow("Image", image)
        # cv2.imshow("Edged", edged)
        # print ("wait key")
        # cv2.waitKey(2000)
        # print ("here")
        cv2.destroyAllWindows()

        # find the contours in the edged image, keeping only the
        # largest ones, and initialize the screen contour
        # print ("on cnts")
        '''(_,cnts, _) = cv2.findContours(edged.copy(), cv2.RETR_LIST, cv2.CHAIN_APPROX_SIMPLE)
        cnts = sorted(cnts, key = cv2.contourArea, reverse = True)[:5]'''

        # # loop over the contours
        '''for c in cnts:
             # approximate the contour
            peri = cv2.arcLength(c, True)
            approx = cv2.approxPolyDP(c, 0.02 * peri, True)

        #     # if our approximated contour has four points, then we
        #     # can assume that we have found our screen

            if len(approx) == 4:
                print (len(approx))
                screenCnt = approx
                break
        # print (screenCnt)
        # show the contour (outline) of the piece of paper='''
        screenCnt = np.array([[[image.shape[1], 0]],  # top left
                                [[0, 0]],  # top right
                                [[0, image.shape[0]]],  # bottom right
                                [[image.shape[1], image.shape[0]]]])  # bottom left
        print ("STEP 2: Find contours of paper")
        cv2.drawContours(image, [screenCnt], -1, (0, 255, 0), 2)
        #cv2.imshow("Outline", image)
        #cv2.waitKey(200)
        cv2.destroyAllWindows()

        # apply the four point transform to obtain a top-down
        # view of the original image
        warped = self.four_point_transform(orig, screenCnt.reshape(4, 2) * ratio)

        # convert the warped image to grayscale, then threshold it
        # to give it that 'black and white' paper effect
        warped = cv2.cvtColor(warped, cv2.COLOR_BGR2GRAY)
        warped = threshold_adaptive(warped, 251, offset=10)
       # ret,warped= cv2.threshold(warped,0,255,cv2.THRESH_BINARY+cv2.THRESH_OTSU)
        warped = warped.astype("uint8") * 255

        # show the original and scanned images
        print ("STEP 3: Apply perspective transform")
        #cv2.imshow("Original", self.resize(orig, height=650))
        #cv2.imshow("Scanned", self.resize(warped, height=650))
        #cv2.waitKey(200)
        cv2.imwrite("/var/www/html/out.jpg", warped)
        print ("STEP 4: Converting image to text")
        im = Image.open("/var/www/html/sample_3.jpg")
	#print("hii1")
        im.filter(ImageFilter.SHARPEN)
	#print("hii2")
	s=pytesseract.image_to_string(im).split()
	#print(len(rf))
	r=""
	for i in s:
	    r=r+i+" "
	to_translate = r
	lng={
'Abkhazian':'ab',
'Afar': 'aa',
'Afrikaans': 	'af',
'Albanian ':	'sq',
'Amharic ':	'am',
'Arabic': 	'ar',
'Aragonese': 	'an',
'Armenian': 	'hy',
'Assamese': 	'as',
'Aymara': 	'ay',
'Azerbaijani': 	'az',
'Bashkir': 	'ba',
'Basque': 	'eu',
'Bengali' :	'bn',
'Bhutani' :	'dz',
'Bihari' :	'bh',
'Bislama' :	'bi',
'Breton': 	'br',
'Bulgarian': 	'bg',
'Burmese' :	'my',
'Byelorussian':  	'be',
'Cambodian': 	'km',
'Catalan' :	'ca' ,	 
'Chinese' :	'zh',
'Corsican' :	'co',
'Croatian' :	'hr',
'Czech' :	'cs',
'Danish' :	'da',
'Dutch' :	'nl',
'English': 	'en',
'Esperanto': 	'eo',
'Estonian' :	'et',
'Faeroese' :	'fo',
'Farsi' :	'fa',
'Fiji': 	'fj',
'Finnish': 	'fi' ,	 
'French': 	'fr',
'Frisian': 	'fy',
'Galician': 	'gl',
'Gaelic':  	'gd',
'Georgian': 	'ka',
'German': 	'de',
'Greek': 	'el',
'Greenlandic': 	'kl',
'Guarani': 	'gn',
'Gujarati' :	'gu',
'Haitian Creole': 	'ht',
'Hausa': 	'ha',
'Hebrew': 	'he',
'Hindi' :	'hi',
'Hungarian': 	'hu',
'Icelandic': 	'is',
'Ido': 	        'io',
'Indonesian': 	'id',
'Interlingua': 	'ia',
'Interlingue': 	'ie',
'Inuktitut': 	'iu',
'Inupiak': 	'ik',
'Irish': 	        'ga',
'Italian': 	'it',
'Japanese': 	'ja',
'Javanese': 	'jv',
'Kannada': 	'kn',
'Kashmiri': 	'ks',
'Kazakh':     'kk',
'Kinyarwanda' :	'rw',
'Kirghiz': 	'ky',
'Kirundi':	'rn',	 
'Korean' :	'ko',
'Kurdish' :	'ku',
'Laothian' :	'lo',
'Latin' :	'la',
'Latvian': 	'ln',
'Lithuanian': 	'lt',
'Macedonian': 	'mk',
'Malagasy': 	'mg',
'Malay' :	'ms',
'Malayalam': 	'ml',
'Maltese' :	'mt',
'Maori' :	'mi',
'Marathi': 	'mr',
'Moldavian': 	'mo',
'Mongolian' :	'mn',
'Nauru' 	:'na',
'Nepali' 	:'ne',
'Norwegian': 	'no',
'Occitan': 	'oc',
'Oriya' :	'or',
'Oromo' :	'om ',	 
'Pashto':	'ps',
'Polish' :	'pl',
'Portuguese': 	'pt',
'Punjabi' 	:'pa',
'Quechua': 	'qu',
'Rhaeto-Romance': 	'rm',
'Romanian' :	'ro',
'Russian' :	'ru' 	 ,
'Samoan' :	'sm',
'Sangro' :	'sg',
'Sanskrit': 	'sa',
'Serbian' :	'sr',
'Serbo-Croatian': 	'sh',
'Sesotho' :	'st',
'Setswana' :	'tn',
'Shona' :	'sn',
'Sichuan Yi': 	'ii',
'Sindhi' :	'sd',
'Sinhalese': 	'si',
'Siswati' :	'ss',
'Slovak' :	'sk',
'Slovenian': 	'sl',
'Somali' :	'so',
'Spanish' :	'es',
'Sundanese': 	'su',
'Swahili' :	'sw',
'Swedish' :	'sv',	 
'Tagalog' :	'tl',
'Tajik' :	'tg' ,	 
'Tamil' :	'ta',
'Tatar' :	'tt',
'Telugu' :	'te',
'Thai' :	'th',
'Tibetan' :	'bo',
'Tigrinya' :	'ti',
'Tonga' :	'to',
'Tsonga' :	'ts',
'Turkish' :	'tr',
'Turkmen' :	'tk',
'Twi' :	'tw',
'Uighur' :	'ug',
'Ukrainian': 	'uk',
'Urdu' 	:'ur',
'Uzbek' :	'uz', 	 
'Vietnamese':	'vi',
'Volapük' :	'vo',
'Wallon' :	'wa',
'Welsh' :	'cy',
'Wolof' :	'wo',
'Xhosa' :	'xh',
'Yiddish':      'ji',
'Yoruba' :	'yo',
'Zulu' 	:'zu'}
	#print s
        #print(translate(to_translate))
        #print(translate(to_translate, 'de'))
	print(translate(to_translate, lng['English']))
	'''
        #print(pytesseract.image_to_string(im))
        with open("/var/www/html/out1.txt", "w") as text_file:
            text_file.write(pytesseract.image_to_string(im))
	print("hii")
        #return pytesseract.image_to_string(im)'''

obj1=image_to_text()
#print(li[1])
(obj1.scan(("/var/www/html/sample_3.jpg")))
