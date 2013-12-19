from xml.dom.minidom import Document
import os
import re
from PIL import Image
import shutil
import random
import time
import glob

class Palette:
	def __init__(self):
		#print 'image info'
		
		self.paletteColors = {}
		self.palette = {}
		

					
	def generatePaletteInfo(self):
		file = 'icon.png'	
		self.im = Image.open(file)
		width = self.im.size[0] 
		height = self.im.size[1] 
		#print height, width
		
		count = 0
	
		for i in range(width):
			for j in range(height):
				pco = self.im.getpixel((i,j))
				
				try:
					count = self.palette[pco]
					count += 1
				except:
					count = 0
				self.palette[pco] = count
						
		#print self.palette
		return self.palette
	
		   
	def _create_styles(self):

		
		count= 0 
		
		keys = []
		
		for key in self.palette:
			keys.append(key)
							
		for key in keys:
			count+=1
			input = open('_template.css', 'r+')
			output = open('style_'+str(count)+'.css', 'w')
			
			def _replace_parts(replace=''):
				newline =''
				
				newline = i.replace('__BGCOLOR__', str("".join(map(chr, key)).encode('hex')))	
				newline = newline.replace('__TEXTCOLOR__', str("".join(map(chr, keys[random.randint(0, len(keys)-1)])).encode('hex')))
				newline = newline.replace('__LINKCOLOR__', str("".join(map(chr, keys[random.randint(0, len(keys)-1)])).encode('hex')))		
				newline = newline.replace('__VISITEDCOLOR__', str("".join(map(chr, keys[random.randint(0, len(keys)-1)])).encode('hex')))
				newline = newline.replace('__HOVERCOLOR__', str("".join(map(chr, keys[random.randint(0, len(keys)-1)])).encode('hex')))
				newline = newline.replace('__ACTIVECOLOR__', str("".join(map(chr, keys[random.randint(0, len(keys)-1)])).encode('hex')))
				newline = newline.replace('__BGINSERTCOLOR__', str("".join(map(chr, keys[random.randint(0, len(keys)-1)])).encode('hex')))
				return newline
			
			f2 = input.readlines()
			for i in f2:
				newline = ''
				newline =_replace_parts(replace=i)
				output.write(newline)
				
			input.close()
			output.close()



p = Palette()
p.generatePaletteInfo()	
p._create_styles()


	
	